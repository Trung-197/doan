<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('backend.order.customer', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->getCustomer()
        ]);
    }
    public function getCustomer()
    {
        return Customer::orderByDesc('id')->paginate(15);
    }
    public function show(Customer $customer)
    {
        $carts = $this->getProductForCart($customer);

        return view('backend.order.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
    public function delete($id)
    {
        $customer = Customer::find($id);
        $cart = Cart::where('customer_id',$id);
        $customer->delete() and $cart->delete();
        return redirect()->back();
    }
    public function getProductForCart($customer)
    {
        return $customer->carts()->with(['product' => function ($query) {
            $query->select('id', 'name', 'feature_image_path');
        }])->get();
    }
    public function getSearchAjax(Request $request)
    {
        $output = '';
        $carts = Cart::select('carts.id','carts.created_at','customers.name','customers.phone','customers.email')
            ->join('customers','customers.id','=','carts.customer_id')
            ->where('carts.id','LIKE','%'.$request->keyword.'%')
            ->orwhere('customers.name','LIKE','%'.$request->keyword.'%')
            ->orderByDesc('carts.id')
            ->get();
        foreach ($carts as $cart) {
            $output .= '       <tr>

                                                <td>'.$cart->id.'</td>
                                                <td>'.$cart->name.'</td>
                                                <td>'.$cart->phone.'</td>
                                                <td>'.$cart->email.'</td>
                                                 <td>
                                                    '.$cart->created_at.'
                                                </td>
                                                <td>
                                                    <span class="badge bg-warning" style="cursor: pointer">
                                                        <a href="/customers/view/'.$cart->id.'">Xem</a>
                                                    </span>
                                                    <span class="badge bg-danger" style="cursor: pointer">
                                                        <a onclick="del('.$cart->id.')">Xoá</a>
                                                        <form id="form-'.$cart->id.'" class="d-none" action="'.route('carts.delete',
                    $cart->id).'" method="post">
                                                            '.csrf_field().'
                                                            '.method_field('delete').'
                                                        </form>
                                                    </span>
                                                 </td>
                                            </tr>
                                            ';
        }

        return response()->json($output);
//        return view('backend.product.search',compact('products'));
    }
}
