
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./electro-master/logo-camera.png" type="image/x-icon">
    @yield('title')
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('electro-master/css/bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('electro-master/css/slick.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('electro-master/css/slick-theme.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('electro-master/css/nouislider.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('electro-master/css/font-awesome.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{ asset('electro-master/css/style.css')}}"/>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    @yield('css')
</head>
<body>
@include('components.header')
@include('components.main_menu')
@yield('content')
@include('components.footer')

<script src="{{ asset('electro-master/js/jquery.min.js')}}"></script>
<script src="{{ asset('electro-master/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('electro-master/js/slick.min.js')}}"></script>
<script src="{{ asset('electro-master/js/nouislider.min.js')}}"></script>
<script src="{{ asset('electro-master/js/jquery.zoom.min.js')}}"></script>
<script src="{{ asset('electro-master/js/main.js')}}"></script>
@yield('js')
</body>
{!! Toastr::message() !!}

</html>
