<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use App\Models\Product;


class ProfileController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('auth');

    }
    public function index($id)
    {
        $products_cart = $this->getProduct();
        $users = $this->user->find($id);
        $categories = Category::where('parent_id', 0)->get();
        $carts = Session::get('carts');
        $categoryLimit = Category::where('parent_id',0)->get();
        return view('user.profile', compact('users','categories','products_cart','carts','categoryLimit'));
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
    public function update($id, Request $request)
    {
        $user = $this->user->find($id);
        $user->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone
        ]);
        Session::flash('success', 'Cập nhật thông tin thành công');
        return back();
    }
}
