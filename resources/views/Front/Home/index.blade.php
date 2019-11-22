@extends('Front.main')
@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                @foreach($urunshops as $urun)
                <div class="col-md-4 col-xs-6">
                    <a href="{{route('Front.checkout')}}">
                    <div class="shop">
                            <div class="shop-img">

                                    <img style="height: 30%; width: 80%;" src="{{\App\Models\Products::find($urun -> id) -> img_url}}"
                                         alt="Slide Image">

                            </div>
                            <div class="shop-body">

                                <h3>${{number_format($urun->price,2,',','.')}}</h3>

                                <a href="{{route('Front.product.see',$urun->id)}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                            </div>

                    </div>
                    </a>
                </div>
            @endforeach

            </div>


            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                                <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                                <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                                <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
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

                                    <!-- product -->
                                    @foreach($urunnews as $urun)
                                        @foreach(\App\Models\Menus::where('id',$urun->menu_id)->get() as $menu)
                                    <div class="product">
                                        <div class="product-img">

                                                <img style=" width: 100%;"
                                                     src="{{\App\Models\Products::find($urun -> id) -> img_url}}"
                                                     alt="">
                                            <div class="product-label">
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$menu->name}}</p>
                                            <h3 class="product-name"><a href="{{route('Front.product.see',$urun->id)}}">
                                                    {{$urun->content}}</a></h3>
                                            <h4 class="product-price"> $ {{number_format($urun->price,2,',','.')}} <del class="product-old-price">
                                                    $ {{number_format($urun->price,2,',','.')}}</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><a href="{{route('Front.favorite_post',$urun->id)}}">
                                                        <i class="fa fa-heart-o" > </i><span class="tooltipp">add to favorites</span></a></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><a href="{{route('Front.product.see',$urun->id)}}">
                                                        <i class="fa fa-eye"></i><span class="tooltipp">Read More</span></a></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><a href="{{route('Front.sepet_post',$urun->id)}}">
                                                    <i class="fa fa-shopping-cart"></i> add to cart</a></button>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                    @endforeach
                                @endforeach

                                    <!-- product -->

                                    <!-- /product -->

                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Days</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Hours</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Mins</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Secs</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">hot deal this week</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Top selling</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
                                <li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
                                <li><a data-toggle="tab" href="#tab2">Cameras</a></li>
                                <li><a data-toggle="tab" href="#tab2">Accessories</a></li>
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
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    @foreach($uruntops as $urun)
                                        @foreach(\App\Models\Menus::where('id',$urun->menu_id)->get() as $menu)
                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">

                                                <img style=" width: 100%;"
                                                     src="{{\App\Models\Products::find($urun -> id) -> img_url}}"
                                                     alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>

                                        </div>

                                        <div class="product-body">
                                            <p class="product-category">{{$menu->name}}</p>
                                            <h3 class="product-name"><a href="{{route('Front.product.see',$urun->id)}}">{{$urun->content}}</a></h3>
                                            <h4 class="product-price">$ {{number_format($urun->price,2,',','.')}}  <del class="product-old-price">
                                                    $ {{number_format($urun->price,2,',','.')}} </del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><a href="{{route('Front.favorite_post',$urun->id)}}">
                                                        <i class="fa fa-heart-o" > </i><span class="tooltipp">add to favorites</span></a></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><a href="{{route('Front.product.see',$urun->id)}}">
                                                        <i class="fa fa-eye"></i><span class="tooltipp">Read More</span></a></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><a href="{{route('Front.sepet_post',$urun->id)}}">
                                                    <i class="fa fa-shopping-cart"></i> add to cart</a></button>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                         @endforeach
                                        @endforeach
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
                        @foreach($urunstop1 as $urun)
                            @foreach(\App\Models\Menus::where('id',$urun->menu_id)->get() as $menu)
                                <!-- product widget -->
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{\App\Models\Products::find($urun -> id) -> img_url}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$menu->name}}</p>
                                            <h3 class="product-name"><a href="{{route('Front.product.see',$urun->id)}}">{{$urun->content}}</a></h3>
                                            <h4 class="product-price"> $ {{number_format($urun->price,2,',','.')}}
                                                <del class="product-old-price"> $ {{number_format($urun->price,2,',','.')}}</del></h4>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach

                        </div>

                        <div>
                        @foreach($urunstop2 as $urun)
                            @foreach(\App\Models\Menus::where('id',$urun->menu_id)->get() as $menu)
                                <!-- product widget -->
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{\App\Models\Products::find($urun -> id) -> img_url}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$menu->name}}</p>
                                            <h3 class="product-name"><a href="{{route('Front.product.see',$urun->id)}}">{{$urun->content}}</a></h3>
                                            <h4 class="product-price"> $ {{number_format($urun->price,2,',','.')}}
                                                <del class="product-old-price"> $ {{number_format($urun->price,2,',','.')}}</del></h4>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-4" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-4">
                        <div>
                        @foreach($urunstop2 as $urun)
                            @foreach(\App\Models\Menus::where('id',$urun->menu_id)->get() as $menu)
                                <!-- product widget -->
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{\App\Models\Products::find($urun -> id) -> img_url}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$menu->name}}</p>
                                            <h3 class="product-name"><a href="{{route('Front.product.see',$urun->id)}}">{{$urun->content}}</a></h3>
                                            <h4 class="product-price"> $ {{number_format($urun->price,2,',','.')}}
                                                <del class="product-old-price"> $ {{number_format($urun->price,2,',','.')}}</del></h4>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach

                        </div>

                        <div>
                        @foreach($urunstop3 as $urun)
                            @foreach(\App\Models\Menus::where('id',$urun->menu_id)->get() as $menu)
                                <!-- product widget -->
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{\App\Models\Products::find($urun -> id) -> img_url}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$menu->name}}</p>
                                            <h3 class="product-name"><a href="{{route('Front.product.see',$urun->id)}}">{{$urun->content}}</a></h3>
                                            <h4 class="product-price"> $ {{number_format($urun->price,2,',','.')}}
                                                <del class="product-old-price"> $ {{number_format($urun->price,2,',','.')}}</del></h4>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="clearfix visible-sm visible-xs"></div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-5" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-5">
                        <div>
                        @foreach($urunstop3 as $urun)
                            @foreach(\App\Models\Menus::where('id',$urun->menu_id)->get() as $menu)
                                <!-- product widget -->
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{\App\Models\Products::find($urun -> id) -> img_url}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$menu->name}}</p>
                                            <h3 class="product-name"><a href="{{route('Front.product.see',$urun->id)}}">{{$urun->content}}</a></h3>
                                            <h4 class="product-price"> $ {{number_format($urun->price,2,',','.')}}
                                                <del class="product-old-price"> $ {{number_format($urun->price,2,',','.')}}</del></h4>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach

                        </div>

                        <div>
                        @foreach($urunstop1 as $urun)
                            @foreach(\App\Models\Menus::where('id',$urun->menu_id)->get() as $menu)
                                <!-- product widget -->
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{\App\Models\Products::find($urun -> id) -> img_url}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$menu->name}}</p>
                                            <h3 class="product-name"><a href="{{route('Front.product.see',$urun->id)}}">{{$urun->content}}</a></h3>
                                            <h4 class="product-price"> $ {{number_format($urun->price,2,',','.')}}
                                                <del class="product-old-price"> $ {{number_format($urun->price,2,',','.')}}</del></h4>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->
@endsection

@section('script')
    <script>
        $(document).on('click' , function(){
            $.ajax({
                type:'post',
                url:'/panel/front/favorite_post'+$(this).val(),
                data:$(this).val(),
                success:function (submenus) {
                    $(submenus).each(function(index){
                        $('#sub_menu_id').append('<option value="'+submenus[index]['id']+'">'+ submenus[index]['name']+'</option>');
                    });
                }
            })

        });

    </script>
@endsection

