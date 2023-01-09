<!doctype html>
<html lang="en">
<head>
    <title>Đăng nhập</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #1E1F29">
            <div class="container">
                <ul class="navbar-nav me-auto">
                    <ul class="header-links pull-left">
                        <li><a href="#"><i class="fa fa-phone"></i>{{getConfigValueFromSettingTable('phone_contact')}}</a></li>
                        <li><a href="#"><i class="fa fa-envelope-o"></i>{{getConfigValueFromSettingTable('email')}}</a></li>
                        <li><a href="{{getConfigValueFromSettingTable('facebook')}}"><i class="fa fa-facebook"></i>{{getConfigValueFromSettingTable('facebook')}}</a></li>
                    </ul>
                </ul>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <a style="color: white; float: right" href="/">Camera Minh Trí</a>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

@include('components.footer')
<script src="{{ asset('electro-master/js/jquery.min.js')}}"></script>
<script src="{{ asset('electro-master/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('electro-master/js/slick.min.js')}}"></script>
<script src="{{ asset('electro-master/js/nouislider.min.js')}}"></script>
<script src="{{ asset('electro-master/js/jquery.zoom.min.js')}}"></script>
<script src="{{ asset('electro-master/js/main.js')}}"></script>
