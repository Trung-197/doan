@extends('layouts.master')
@section('title')
    <title>Home page</title>
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection
@section('content')
    <body>
    <section>
        <div class="container" style="margin-top: 20px">
            <div class="row">
                    <div class="col-sm-12 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="col-sm-5">
                                <div class="view-product">
                                    <img src="/products/{{$product->feature_image_path}}" alt="" style="max-width: 400px"/>
                                    <h3>ZOOM</h3>
                                </div>

                            </div>
{{--                            <div class="col-sm-7">--}}
{{--                                <div class="product-information"><!--/product-information-->--}}

{{--                                    <h2>{{$product->name}}</h2>--}}
{{--                                    <p>ID : {{$product->id}}</p>--}}
{{--                                    <img src="images/product-details/rating.png" alt="" />--}}
{{--                                    <span>--}}
{{--									<span>{{ number_format($product->price) }} VNĐ</span>--}}
{{--								</span>--}}
{{--                                    <p><b>Description:</b>{{$product->content}}</p>--}}
{{--                                    @if($product->price !==NULL)--}}
{{--                                    <form action="{{route('add-cart')}}" method="post">--}}
{{--                                        <p><b>Quantity:--}}
{{--                                                <input class="mtext-104 cl3 txt-center num-product" type="number"--}}
{{--                                                    name="num_product" value="1" style="width: 50px !important;">--}}
{{--                                            </b>--}}
{{--                                            <button type="submit" class="btn btn-fefault cart">--}}
{{--                                                <i class="fa fa-shopping-cart"></i>--}}
{{--                                                Add to cart--}}
{{--                                            </button>--}}
{{--                                            <input type="hidden" name="product_id" value="{{$product->id}}">--}}
{{--                                        </p>--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                    @endif--}}
{{--                                </div><!--/product-information-->--}}
{{--                            </div>--}}
                        </div><!--/product-details-->
                        <div class="col-md-7">
                            <div class="product-details">
                                <h2 class="product-name">{{$product->name}}</h2>
                                <div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <a class="review-link" href="#">10 Review(s) | Add your review</a>
                                </div>
                                <div>
                                    <h3 class="product-price">{{ number_format($product->price) }} VNĐ</h3>
                                    <span class="product-available">In Stock</span>
                                </div>
                                <pre>{{$product->content}}</pre>
                                @if($product->price !==NULL)
                                <form action="{{route('add-cart')}}" method="post">
                                    <div class="add-to-cart">
                                        <div class="qty-label">
                                            Số lượng
                                            <div class="input-number">
                                                <input type="number" name="num_product" value="1">
                                                <span class="qty-up">+</span>
                                                <span class="qty-down">-</span>
                                            </div>
                                        </div>
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        @csrf
                                    </div>
                                </form>
                                @endif
                                <ul class="product-btns">
                                    <li><a href="#"><i class="fa fa-heart-o"></i>Yêu thích</a></li>
                                </ul>

                                <ul class="product-links">
                                    <li>Loại sản phẩm:</li>
                                    <li><a href="{{route('category.product',['slug' => $product->category->slug,'id' => $product->category->id])}}">{{$product->category->name}}</a></li>
                                </ul>

                                <ul class="product-links">
                                    <li>Share:</li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                </ul>

                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </section>
    @endsection
    </body>
