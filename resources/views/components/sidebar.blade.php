{{--<div class="col-sm-3">--}}
{{--    <div class="left-sidebar">--}}
{{--        <h2>Category</h2>--}}
{{--        <div class="panel-group category-products" id="accordian"><!--category-productsr-->--}}
{{--            @foreach($categories as $category)--}}
{{--            <div class="panel panel-default">--}}
{{--                <div class="panel-heading">--}}
{{--                    <h4 class="panel-title">--}}
{{--                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{$category->id}}">--}}
{{--                            <span class="badge pull-right">--}}
{{--                                @if($category->children->count())--}}
{{--                                <i class="fa fa-plus">--}}
{{--                                </i>--}}
{{--                                @endif--}}
{{--                            </span>--}}
{{--                            {{ $category->name }}--}}
{{--                        </a>--}}
{{--                    </h4>--}}
{{--                </div>--}}
{{--                <div id="sportswear_{{$category->id}}" class="panel-collapse collapse">--}}
{{--                    <div class="panel-body">--}}
{{--                        @foreach($category->children as $categoryChild)--}}
{{--                        <ul>--}}
{{--                                <li><a href="{{route('category.product',['slug' => $categoryChild->slug,'id' => $categoryChild->id])}}">{{$categoryChild->name}} </a></li>--}}
{{--                        </ul>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            @endforeach--}}
{{--        </div><!--/category-products-->--}}
{{--        <div class="price-range"><!--price-range-->--}}
{{--            <h2>Price Range</h2>--}}
{{--            <div class="well text-center">--}}
{{--                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />--}}
{{--                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>--}}
{{--            </div>--}}
{{--        </div><!--/price-range-->--}}

{{--        <div class="shipping text-center"><!--shipping-->--}}
{{--            <img src="images/home/shipping.jpg" alt="" />--}}
{{--        </div><!--/shipping-->--}}

{{--    </div>--}}
{{--</div>--}}
{{--</div>--}}
<div id="aside" class="col-md-3">
    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Loại sản phẩm</h3>
        <div class="checkbox-filter">
            @foreach($categories as $category)
            <div class="input-checkbox">
                <input type="checkbox" id="id-{{$category->id}}">
                <label for="category-1">
                    <span></span>
                    {{$category->name}}
                    <small>{{$category->products->count()}}</small>
                </label>
            </div>
            @endforeach
        </div>
    </div>
    <!-- /aside Widget -->

    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Price</h3>
        <div class="price-filter">
            <div id="price-slider"></div>
            <div class="input-number price-min">
                <input id="price-min" type="number">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
            </div>
            <span>-</span>
            <div class="input-number price-max">
                <input id="price-max" type="number">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
            </div>
        </div>
    </div>
    <!-- /aside Widget -->

    <!-- aside Widget -->

    <!-- /aside Widget -->

    <!-- aside Widget -->

    <!-- /aside Widget -->
</div>
<!-- /ASIDE -->
