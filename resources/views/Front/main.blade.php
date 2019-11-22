<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Vatan Computer</title>

    <script src="jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('FRONT/css/bootstrap.min.css')}}"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{asset('FRONT/css/slick.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('FRONT/css/slick-theme.css')}}"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{asset('FRONT/css/nouislider.min.css')}}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('FRONT/css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('FRONT/css/style.css')}}"/>
    <!-- Profile -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,700,800">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('profile/css/app.css')}}">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!-[endif]-->
    <!--sepet-->


</head>
<body>
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->

    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> 0850 222 56 56</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> info@vatanbilgisayar.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
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
                <div class="col-md-1">
                    <div class="header-logo">
                        <a href="{{route('main')}}" class="logo">
                            <img height="80" width="120" src="{{asset('/img/logo.jpg')}}" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-md-3">

                    <div id="menu" style="border: 1px; border-color: white;" >
                        <!-- NAV -->
                        <ul class="hmenu">
                            <li><a href="#"> <img height="50" width="200" src="{{asset('/img/urun.jpg')}}" alt=""></a>
                                <ul>
                                    @foreach($menus as $item)
                                        <li>   <a href="{{route('Front.menustore',$item->id)}}">{{$item->name}}</a>
                                            <ul> <li>

                                                        @foreach($item->subMenus as $subitem)
                                                            <a href="{{route('Front.substore',$subitem->id)}}">{{$subitem->name}}</a>
                                                        @endforeach </li>
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                        </ul>
                        <!-- /NAV -->
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-4">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">All Categories</option>
                                <option value="1">Category 01</option>
                                <option value="1">Category 02</option>
                            </select>
                            <input class="input" placeholder="Search">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-4 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div class="dropdown">
                            <a href="{{route('Front.checkout')}}" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Favoriler</span>
                                <div class="qty">{{$favorites->count()}}</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    @foreach($favorites as $favorite)
                                        @foreach(\App\Models\Products::where('id',$favorite->urun_id)->get() as $urun)
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{\App\Models\Products::find($urun -> id) -> img_url}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="{{route('Front.product.see',$urun->id)}}">{{$urun->content}}</a></h3>
                                            <h4 class="product-price" style="color:red;">$ {{number_format($urun->price,2,',','.')}}</h4>
                                        </div>
                                        <a  class="delete" href="{{route('Front.favorite.remove',$favorite->id)}}">
                                            <i class="fa fa-close"></i>
                                        </a>
                                            </div>
                                        @endforeach
                                    @endforeach

                                </div>

                                <div class="cart-btns">
                                    <a class="primary-btn order-submit" style="width: 280px;" href="{{route('Front.favorite')}}">See All <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Wishlist -->


                        <!-- Cart -->
                        <div class="dropdown">
                            <a href="{{route('Front.checkout')}}" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Sepetim</span>
                                <div class="qty">{{$sepets->count()}}</div>
                            </a>
                            <div class="cart-dropdown">

                                <div class="cart-list">
                                    @foreach($sepets as $sepet)
                                        @foreach(\App\Models\Products::where('id',$sepet->urun_id)->get() as $urun)
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{$urun->img_url}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#}}">
                                                        {{$urun->content}}</a></h3>
                                            <h4 class="product-price"><span class="qty">{{$sepet->number}}x</span>$ {{number_format($urun->price,'2',',','.')}}</h4>
                                        </div>
                                        <a  class="delete" href="{{route('Front.sepet.product_remove',$sepet->id)}}">
                                            <i class="fa fa-close"></i>
                                        </a>
                                    </div>
                                        @endforeach
                                    @endforeach
                                </div>

                                <div class="cart-summary">
                                    <small>{{$sepets->count()}} Item(s) selected</small>
                                    <h5>SUBTOTAL: $2940.00</h5>
                                </div>
                                <div class="cart-btns">
                                    <a class="primary-btn order-submit" style="width: 280px;" href="{{route('Front.sepet')}}">View Cart <i class="fa fa-arrow-circle-right"></i></a>
                                    <a class="primary-btn order-submit" style="width: 280px;" href="{{route('Front.checkout')}}">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Wishlist -->

                    <!-- /Wishlist -->
                        @guest

                                <!-- NAV -->
                                <ul class="hmenu">

                                <li >
                                    <a href="javascript:;" data-toggle="dropdown"
                                       aria-expanded="false">
                                        <img height="35" width="35" style="border-radius: 15px" src="{{asset('/img/misafir.PNG')}}" alt="">
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="hmenu">
                                        <li class="nav-item">
                                            <a style="font-size: 10px;" class="nav-link" href="{{ route('login') }}">{{ __('Oturum Aç') }}<i class="fa fa-arrow-circle-right"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a style="font-size: 10px;" class="nav-link" href="{{ route('register') }}">{{ __('Hesap Oluştur ') }}<i class="fa fa-edit"></i></a>
                                        </li>


                                    </ul>
                                </li>
                            </ul>

                        @endguest
                        @auth

                            <ul class="hmenu">

                                <li >
                                    <a href="javascript:;" data-toggle="dropdown"
                                       aria-expanded="false">
                                        <img height="35" width="35" style="border-radius: 15px" src="{{asset('/img/misafir2.PNG')}}" alt="">
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="hmenu">

                                        <li>
                                            <a style="font-size: 10px;" class="nav-link" href="{{ route('Front.profile') }}">

                                            {{Illuminate\Support\Facades\Auth::user()->name}}
                                          </a>
                                        </li>

                                        @if(Illuminate\Support\Facades\Auth::user()->admin==1)
                                        <li class="nav-item">
                                            <a style="font-size: 10px;" class="nav-link" href="{{ route('CMS.home') }}">{{ __('Ayarlar  ') }}<i class="fa fa-edit"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a style="font-size: 10px;" class="nav-link" href="{{ route('log_out') }}">{{ __('Log Out') }}<i class="fa fa-sign-out pull-right"></i></a>
                                        </li>


                                        @else

                                            <li class="nav-item">
                                                <a style="font-size: 10px;" class="nav-link" href="{{ route('log_out') }}">{{ __('Log Out') }}</a>
                                            </li>
                                        @endif
                                    </ul>
                        @endauth
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
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">

                <li><a href="{{route('main')}}">Home</a></li>
                <li><a href="{{route('Front.blank')}}">Blank</a></li>


            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->


<!-- SECTION -->
@yield('content')
<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                            <li><a href="#">Hot deals</a></li>
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">Smartphones</a></li>
                            <li><a href="#">Cameras</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Orders and Returns</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="{{asset('FRONT/js/jquery.min.js')}}"></script>
<script src="{{asset('FRONT/js/bootstrap.min.js')}}"></script>
<script src="{{asset('FRONT/js/slick.min.js')}}"></script>
<script src="{{asset('FRONT/js/nouislider.min.js')}}"></script>
<script src="{{asset('FRONT/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('FRONT/js/main.js')}}"></script>

</body>
</html>
