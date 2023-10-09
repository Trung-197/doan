<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categories = Category::where('parent_id', 0)->get();
        $products = Product::latest()->get();
        $productsRecommend = Product::get();
        $products_hot = Product::orderbyDesc('quantity_sold')->limit(6)->get();
        $products_cart = $this->getProduct();
        $carts = Session::get('carts');
        $categoryLimit = Category::where('parent_id',0)->get();
        return view('home.home',compact('sliders','categories','products','productsRecommend','categoryLimit','products_cart','products_hot','carts'));
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
    public function search(Request $request)
    {
        $sliders = Slider::latest()->get();
        $productsRecommend = Product::get();
        $products_cart = $this->getProduct();
        $carts = Session::get('carts');
        $categoryLimit = Category::where('parent_id',0)->get();
        $keyword = $request->input('keyword');
        $category_id = $request->input('category_id');
        $categories = Category::where('parent_id', 0)->get();
        if($category_id == '0')
        {
            $products = Product::select('products.id','products.name','products.feature_image_path','products.content','products.price','products.category_id')
                ->join('categories','products.category_id','=','categories.id')
                ->where('products.name','LIKE','%' . $keyword .'%')->paginate(8);
        }
        else
        {
            $products = Product::select('products.id','products.name','products.feature_image_path','products.content','products.price','products.category_id')
                ->join('categories','products.category_id','=','categories.id')
                ->where('products.category_id','=',$category_id)
                ->where('products.name','LIKE','%' . $keyword .'%')->paginate(8);
        }
        return view('home.home',compact('sliders','categories','products','productsRecommend','categoryLimit','products_cart','carts'));
    }
}
