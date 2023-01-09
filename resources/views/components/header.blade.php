<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i>{{getConfigValueFromSettingTable('phone_contact')}}</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i>{{getConfigValueFromSettingTable('email')}}</a></li>
                <li><a href="{{getConfigValueFromSettingTable('facebook')}}"><i class="fa fa-facebook"></i>{{getConfigValueFromSettingTable('facebook')}}</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-dollar"></i> VNĐ</a></li>
                @if(Auth::check())
                    <li>
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="cursor: pointer">
                                <i class="fa fa-user-o"></i>
                                {{auth()->user()->name}}
                            </a>
                            <div class="user-dropdown" style="text-align: center">
                                <div class="cart-list" style="padding-bottom: 10px">
                                    <a href="{{ route('profile',['id' => \Illuminate\Support\Facades\Auth::user()->id]) }}" style="color: white;">Thông tin</a>
                                </div>
                                <div class="cart-list" style="padding-bottom: 10px">
                                    <a href="/change-password" style="color: white;">Đổi mật khẩu</a>
                                </div>
                                <form id="logout-form" action="{{route('logout')}}" method="POST">
                                    <div class="cart-list">
                                        <a href="{{ route('logout') }}" style="color: white"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                            Đăng xuất
                                        </a>
                                    </div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </form>
                            </div>
                        </div>
                    </li>
                    @else
                    <li><a href="/login"><i class="fa fa-user-o"></i> Đăng nhập</a></li>
                @endif
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-2">
                    <div class="header-logo">
                        <a href="{{route('home')}}" class="logo">
                            <img src="/electro-master/logo-camera.png" width="80px" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-7">
                    <div class="header-search">
                        <form action="{{route('search')}}" method="GET">
                            <select class="input-select" name="category_id">
                                <option value="0">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <input class="input" placeholder="Search here" name="keyword" width=""/>
                            <button class="search-btn" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Yêu thích</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="cursor: pointer">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Giỏ hàng</span>
                                <div class="qty">{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}</div>
                            </a>
{{--                            <ul class="nav navbar-nav">--}}
{{--                                --}}{{--                            <li><a href="#"><i class="fa fa-user"></i> Account</a></li>--}}
{{--                                <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>--}}
{{--                                <li><a href="{{route('carts')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>--}}
{{--                                <li><a href="{{route('carts')}}"><i class="fa fa-shopping-cart">--}}
{{--                                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"--}}
{{--                                                 data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">--}}
{{--                                                <i class="zmdi zmdi-shopping-cart"></i>--}}
{{--                                            </div></i>{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }} Cart</a></li>--}}
{{--                                --}}{{--                            <li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>--}}
{{--                            </ul>--}}
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    @foreach($products_cart as $product)
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="/products/{{$product->feature_image_path}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">{{$product->name}}<span style="color: red"> x {{$carts[$product->id]}}</span></a></h3>
                                            <h4 class="product-price"><span class="qty">{{$product->num_product}}</span>{{ number_format($product->price) }} VNĐ</h4>
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                                <div class="cart-summary">
                                    <small>{{!is_null($products_cart) ? count($products_cart) : '0'}} sản phẩm đã thêm</small>
                                    <h5></h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="{{route('carts')}}">Xem giỏ hàng</a>
                                    <a href="{{route('carts')}}">Thanh toán  <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
