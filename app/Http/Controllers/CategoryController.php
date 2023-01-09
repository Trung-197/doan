<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index($slug,$categoryId)
    {
        $sliders = Slider::latest()->get();
        $categories = Category::where('parent_id', 0)->get();
        $categoryLimit = Category::where('parent_id',0)->get();
        $products_cart = $this->getProduct();
        $carts = Session::get('carts');
        $products = Product::where('category_id',$categoryId)->paginate(9);
        return view('product.category.list',compact('categoryLimit','products','categories','products_cart','sliders','carts'));
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
}
