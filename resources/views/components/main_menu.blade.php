
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- /NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="{{route('home')}}">Home</a></li>
                @foreach($categoryLimit as $categoryParent)
                    <li><a href="{{route('category.product',['slug' => $categoryParent->slug,'id' => $categoryParent->id])}}">{{$categoryParent->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
