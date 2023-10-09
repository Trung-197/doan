@extends('layouts.master')
@section('title')
    <title>Camera Minh Trí</title>
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection
@section('content')


    <body>
    <section id="advertisement">
    </section>
    <section>
        <div class="container">
            <div class="row">
                @include('components.sidebar')
                <div class="col-sm-9 padding-right">
{{--                    <div class="features_items"><!--features_items-->--}}
{{--                        <h2 class="title text-center">Features Items</h2>--}}
{{--                        @foreach($products as $product)--}}
{{--                            <div class="col-sm-4">--}}
{{--                                <div class="product-image-wrapper">--}}
{{--                                    <div class="single-products">--}}
{{--                                        <div class="productinfo text-center">--}}
{{--                                            <img src="/products/{{$product->feature_image_path}}" alt="" />--}}
{{--                                            <h2>{{number_format($product->price)}} VND </h2>--}}
{{--                                            <p>{{$product->name}}</p>--}}
{{--                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-overlay">--}}
{{--                                            <div class="overlay-content">--}}
{{--                                                <h2>{{number_format($product->price)}} VND</h2>--}}
{{--                                                <p>{{$product->name}}</p>--}}
{{--                                                <a href="{{route('product-details.index',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="choose">--}}
{{--                                        <ul class="nav nav-pills nav-justified">--}}
{{--                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>--}}
{{--                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}


{{--                    </div><!--features_items-->--}}
                    <!-- STORE -->
                    <div id="store" class="col-md-12">
                        <!-- store top filter -->
                        <div class="store-filter clearfix">
                            <div class="store-sort">
                                <label>
                                    Sort By:
                                    <select class="input-select">
                                        <option value="0">Popular</option>
                                        <option value="1">Position</option>
                                    </select>
                                </label>

                                <label>
                                    Show:
                                    <select class="input-select">
                                        <option value="0">20</option>
                                        <option value="1">50</option>
                                    </select>
                                </label>
                            </div>
                            <ul class="store-grid">
                                <li class="active"><i class="fa fa-th"></i></li>
                                <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                            </ul>
                        </div>
                        <!-- /store top filter -->

                        <!-- store products -->
                        <div class="row">
                            <!-- product -->
                            @foreach($products as $product)
                            <div class="col-md-4 col-xs-6">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="/products/{{$product->feature_image_path}}" alt="">
                                        <div class="product-label">
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{$product->category->name}}</p>
                                        <h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
                                        <h4 class="product-price">{{number_format($product->price)}} VND</h4>
                                        <div class="product-rating">
                                            Đã bán: {{$product->quantity_sold}}
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Yêu thích</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem nhanh</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="{{route('product-details.index',$product->id)}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Mua hàng</button></a>
{{--                                        <a href="{{route('product-details.index',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                            <!-- /product -->
                        </div>
                        <div class="store-filter clearfix">
                            {{$products->links()}}
                        </div>
                        <!-- /store bottom filter -->
                    </div>
                    <!-- /STORE -->
                </div>
            </div>
        </div>
    </section>
    @endsection
    </body>


