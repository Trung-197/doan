<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    private $cart;
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
        $this->middleware('auth');
    }
    public function show()
    {
        $categoryLimit = Category::where('parent_id',0)->get();
        $categories = Category::where('parent_id',0)->get();
        $products_cart = $this->getProduct();
        return view('carts.index', [
            'products_cart' => $products_cart,
            'carts' => Session::get('carts'),
            'categoryLimit' => $categoryLimit,
            'categories' => $categories
        ]);
    }
    public function getProduct()
    {
            $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'feature_image_path', 'content')
            ->whereIn('id', $productId)
            ->get();
    }
    public function index(Request $request)
    {
        $result = $this->create($request);
        if ($result === false) {
            return redirect()->back();
        }
        return redirect()->route('carts');
    }

    public function create($request)
    {
        $qty = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');
        $quantity = Product::where('id',$product_id)->first();
        if ($qty > $quantity->quantity) {
            Session::flash('error', 'Không đủ số lượng sản phẩm trong kho');
            return false;
        }

        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
        }
        $carts[$product_id] = $qty;
        Session::put('carts', $carts);
    }
    public function update(Request $request)
    {
        $this->edit($request);
        return redirect()->route('carts');

    }
    public function edit($request)
    {
        Session::put('carts', $request->input('num_product'));
        return true;
    }
    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);
        Session::put('carts', $carts);
        return redirect()->route('carts');
    }
    public function addCart(Request $request)
    {
        try {
            DB::beginTransaction();
            $carts = Session::get('carts');

            if (is_null($carts)) {
                Session::flash('error', 'Giỏ hàng của bạn đang trống');
                return back();
            }
            $customer = Customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'status' => $request->input('status')
            ]);
            $this->infoProductCart($carts, $customer->id);
            DB::commit();
            $cart = Cart::where('customer_id',$customer->id)->get();
            foreach ($cart as $value)
            {
                $product_id = $value->product_id;
                $product = Product::where('id',$product_id)->first();
                $product_quantity = $product->quantity;
                $product_qty['quantity'] = $product_quantity - $value->pty;
                $product_sold['quantity_sold'] = $product->quantity_sold + $value->pty;
                Product::where('id',$product_id)->update($product_qty);
                Product::where('id',$product_id)->update($product_sold);
            }
            Session::flash('success', 'Đặt hàng thành công');

            #Queue
            SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));
            Session::forget('carts');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Vui lòng cập nhật đầy đủ thông tin cá nhân trước khi đặt hàng');
            return back();
        }
        return redirect()->back();
    }

    protected function infoProductCart($carts, $customer_id)
    {
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'feature_image_path', 'content')
            ->whereIn('id', $productId)
            ->get();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'pty'   => $carts[$product->id],
                'price' => $product->price_sale != 0 ? $product->price_sale : $product->price,
                'created_at' => Carbon::now()
            ];

        }

        return Cart::insert($data);
    }
    public function getCustomer()
    {
        return Customer::orderByDesc('id')->paginate(15);
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function momo_payment(Request $request)
    {
        $carts = Session::get('carts');

        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $request->total_momopay;
        $orderId = time() ."";
        $returnUrl = "http://localhost:8000/carts";
        $notifyurl = "http://localhost:8000/atm/ipn_momo.php";
        // Lưu ý: link notifyUrl không phải là dạng localhost
        $bankCode = "SML";

        $requestId = time()."";
        $requestType = "payWithMoMoATM";
        $extraData = "";
        //before sign HMAC SHA256 signature
        $rawHashArr =  array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'bankCode' => $bankCode,
            'returnUrl' => $returnUrl,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType
        );
        $rawHash = "partnerCode=".$partnerCode."&accessKey=".$accessKey."&requestId=".$requestId."&bankCode=".$bankCode."&amount=".$amount."&orderId=".$orderId."&orderInfo=".$orderInfo."&returnUrl=".$returnUrl."&notifyUrl=".$notifyurl."&extraData=".$extraData."&requestType=".$requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data =  array('partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'bankCode' => $bankCode,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result,true);  // decode json
        try {
            DB::beginTransaction();

            $carts = Session::get('carts');

            if (is_null($carts)) {
                Session::flash('error', 'Giỏ hàng của bạn đang trống');
                return back();
            }
            $customer = Customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'status' => $request->input('status')
            ]);

            $this->infoProductCart($carts, $customer->id);
            DB::commit();
            $cart = Cart::where('customer_id',$customer->id)->get();
            foreach ($cart as $value)
            {
                $product_id = $value->product_id;
                $product = Product::where('id',$product_id)->first();
                $product_quantity = $product->quantity;
                $product_qty['quantity'] = $product_quantity - $value->pty;
                $product_sold['quantity_sold'] = $product->quantity_sold + $value->pty;
                Product::where('id',$product_id)->update($product_qty);
                Product::where('id',$product_id)->update($product_sold);
            }
            Session::flash('success', 'Đặt hàng thành công');

            #Queue
            SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));
            Session::forget('carts');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Vui lòng cập nhật đầy đủ thông tin cá nhân trước khi đặt hàng');
            return back();
        }
        return Redirect::to($jsonResult['payUrl']);


    }

}
