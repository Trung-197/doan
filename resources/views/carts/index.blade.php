@extends('layouts.master')
@section('title')
    <title>Camera Minh Trí</title>
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection
@section('content')
    <body>
    <section id="cart_items">
        <div class="container">
            <form action="{{route('update-cart')}}" method="post">
                @if (count($products_cart) != 0)
                    @php
                        $total = 0;
                    @endphp
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Shopping Cart</li>
                        </ol>
                    </div>
                    <div class="table-responsive cart_info">
                        <table class="table table-condensed">
                            <thead>
                            <tr class="cart_menu">
                                <td class="image">Ảnh</td>
                                <td class="description">Tên sản phẩm</td>
                                <td class="price">Giá sản phẩm</td>
                                <td class="quantity">Số lượng</td>
                                <td class="total">Tổng giá</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products_cart as $key => $product)
                                <tr>
                                    <td class="cart_product">
                                        <a href=""><img src="/products/{{$product->feature_image_path}}" width="50px" height="50px" alt=""></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">{{$product->name}}</a></h4>
                                        <p>ID : {{$product->id}}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{number_format($product->price)}} VNĐ</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                   name="num_product[{{$product->id}}]" value="{{$carts[$product->id]}}" min="1" style="width: 50px !important;">
                                        </div>
                                    </td>
                                    @php
                                        $price = $product->price;
                                        $priceEnd = $price * $carts[$product->id];
                                        $total += $priceEnd;
                                    @endphp
                                    <td class="cart_total">
                                        <p class="cart_total_price">{{number_format($priceEnd)}} VNĐ</p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete" href="/carts/delete/{{$product->id}}"><i class="fa fa-times"></i></a>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        <div class="text-center">
                            <input type="submit" value="Cập nhật giỏ hàng" formaction="{{route('update-cart')}}"
                                   class="btn btn-default update" style="margin-bottom: 20px">
                            @csrf
                            <p class="cart_total_price" style="font-weight: bold; font-size: 20px">Tổng : {{number_format($total)}} VNĐ</p>

                        </div>

                    </div>
            </form>
            @else
                <div class="text-center"><h2>Giỏ hàng trống</h2></div>
            @endif
        </div>

    </section> <!--/#cart_items-->
    <section id="do_action">
        <div class="container">
            @include('alert.alert')
{{--            @if(is_null(auth()->user()->name) or is_null(auth()->user()->email) or is_null(auth()->user()->phone) or is_null(auth()->user()->address))--}}
{{--                <div class="alert alert-danger">--}}
{{--                    Vui lòng cập nhật đầy đủ thông tin cá nhân trước khi đặt hàng--}}
{{--                </div>--}}
{{--            @else--}}

                        <div style="float: right">

                @csrf
            </div>
            <div style="float: right">
            <form action="{{route('order')}}" method="post">
                    <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                    <input type="hidden" name="phone" value="{{ auth()->user()->phone }}">
                    <input type="hidden" name="address" value="{{ auth()->user()->address }}">
                    <input type="hidden" name="status" value=" Thanh toán khi nhận hàng ">

                <button type="submit" formaction="{{route('order')}}"
                            class="btn btn-default update" style="margin-bottom: 0px; background-color: yellowgreen">
                        <span style="color: white">ĐẶT HÀNG</span>
                    </button>
                    @csrf
            </form>
            </div>
            <div style="float: right">
            @if (count($products_cart) != 0)
            <form action="{{ route('user.pay') }}" method="POST">
                @csrf
                <input type="hidden" name="total_momopay" value="{{ $total }}">
                <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                <input type="hidden" name="phone" value="{{ auth()->user()->phone }}">
                <input type="hidden" name="address" value="{{ auth()->user()->address }}">
                <input type="hidden" name="status" value=" Đã thanh toán ">
                <button type="submit" class="col-4 btn btn-primary" name="payUrl">MOMO Payment</button>
            </form>
            @endif
            </div>
{{--            @endif--}}

        </div>
    </section><!--/#do_action-->
    @endsection
    </body>


