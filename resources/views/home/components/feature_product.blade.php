
<!-- section title -->
<div class="col-md-12">
    <div class="section-title">
        <h3 class="title">Sản phẩm mới</h3>
        <div class="section-nav" style="margin-top: 15px">
            <ul class="section-tab-nav tab-nav">
                @foreach($categories as $category)
                <li><a data-toggle="tab" href="#tab1">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!-- /section title -->

<!-- Products tab & slick -->
<div class="col-md-12">
    <div class="row">
        <div class="products-tabs">
            <!-- tab -->
            <div id="tab1" class="tab-pane active">
                <div class="products-slick" data-nav="#slick-nav-1">
                    <!-- product -->
                    @foreach($products as $product)

                    <div class="product">
                        <div class="product-img">
                            <img src="/products/{{$product->feature_image_path}}" width="200px" height="250px" alt="">
                            <div class="product-label">
                                <span class="new">NEW</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{$product->category->name}}</p>
                            <h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
                            <h4 class="product-price">{{number_format($product->price)}} VND</h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Yêu thích</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem nhanh</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <a href="{{route('product-details.index',$product->id)}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Mua hàng</button></a>
                        </div>
                    </div>
                    <!-- /product -->
                    @endforeach
                </div>
                <div id="slick-nav-1" class="products-slick-nav"></div>
            </div>
            <!-- /tab -->
        </div>
    </div>
</div>
<!-- Products tab & slick -->

<!-- section title -->
<div class="col-md-12">
    <div class="section-title">
        <h3 class="title">Sản phẩm bán chạy</h3>
        <div class="section-nav" style="margin-top: 15px">

        </div>
    </div>
</div>
<!-- /section title -->

<!-- Products tab & slick -->
<div class="col-md-12">
    <div class="row">
        <div class="products-tabs">
            <!-- tab -->
            <div id="tab1" class="tab-pane active">
                <div class="products-slick" data-nav="">
                    <!-- product -->
                    @foreach($products_hot as $product)

                        <div class="product">
                            <div class="product-img">
                                <img src="/products/{{$product->feature_image_path}}" width="200px" height="250px" alt="">
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
                                <a href="{{route('product-details.index',$product->id)}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Mua hàng</button></a>
                            </div>
                        </div>
                        <!-- /product -->
                    @endforeach
                </div>
                <div id="slick-nav-1" class="products-slick-nav"></div>
            </div>
            <!-- /tab -->
        </div>
    </div>
</div>
<!-- Products tab & slick -->
