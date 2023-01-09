@extends('layouts.master')
@section('title')
    <title>Camera Minh Trí</title>
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection
@section('content')
<body>
@include('home.components.slider')
<section>
    <div class="container">
        <div class="row">
                @include('home.components.category_tab')
                @include('home.components.recommend_product')
                @include('home.components.feature_product')
        </div>
    </div>
</section>
@endsection
</body>
