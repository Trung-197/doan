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
            @include('alert.alert')
            <div class="row">
                <div class="col-md-12">
                    <!-- Billing Details -->
                    <form action="{{ route('update-profile',['id'=>$users->id]) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Thông tin cá nhân</h3>
                            </div>
                            <div class="col-md-6" style="margin: 0 auto">
                                <div class="form-group">
                                    <input class="input" type="text" name="name" placeholder="Họ tên" value="{{$users->name}}">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="address" placeholder="Địa chỉ" value="{{$users->address}}">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="phone" placeholder="Điện thoại" value="{{$users->phone}}">
                                </div>
                                <div class="form-group">
                                    <button type="submit" style="background-color:aquamarine ">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    @endsection
    </body>
