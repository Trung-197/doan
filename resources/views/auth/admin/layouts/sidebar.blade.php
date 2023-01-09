<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{route('dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>Dashboard</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="/dashboard/images/default.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="index.html">Dashboard</a></li>
                            <li><a href="index2.html">Dashboard2</a></li>
                            <li><a href="index3.html">Dashboard3</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Menu <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="form.html">List</a></li>
                            <li><a href="form_advanced.html">Create</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-bars"></i> Loại sản phẩm <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('category.index')}}">Danh sách</a></li>
                            <li><a href="{{route('category.create')}}">Thêm mới</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-pencil"></i> Sản phẩm <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('product.index')}}">Danh sách</a></li>
                            <li><a href="{{route('product.create')}}">Thêm mới</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i> Slider <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('slider.index')}}">Danh sách</a></li>
                            <li><a href="{{route('slider.create')}}">Thêm mới</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-building"></i> Đơn hàng <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('carts.index')}}">Danh sách</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Báo cáo - Thống kê <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="">Doanh thu</a></li>
                            <li><a href="">Sản phẩm đã bán</a></li>

                        </ul>
                    </li>
                    <li><a><i class="fa fa-wrench"></i> Cài đặt <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('settings.index')}}">Danh sách</a></li>
                            <li><a href="{{route('settings.create')}}">Thêm mới</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-users"></i> Người dùng <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('users.index')}}">Danh sách</a></li>
                            <li><a href="{{route('users.create')}}">Thêm mới</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Vai trò <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('roles.index')}}">Danh sách</a></li>
                            <li><a href="{{route('roles.create')}}">Thêm mới</a></li>
                        </ul>
                    </li>
                        <li><a><i class="fa fa-calendar-o"></i> Quyền <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('permissions.index')}}">Danh sách</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
