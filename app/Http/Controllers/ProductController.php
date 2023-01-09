<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index($id)
    {
        $categories = Category::where('parent_id', 0)->get();
        $product = $this->product->find($id);
        $productsRecommend = Product::take(12)->get();
        $categoryLimit = Category::where('parent_id',0)->get();
        $products_cart = $this->getProduct();
        $carts = Session::get('carts');
        return view('product.details.index',compact('categories','product','productsRecommend','categoryLimit','products_cart','carts'));
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
