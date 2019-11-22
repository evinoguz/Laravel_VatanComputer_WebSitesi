@extends('Front.main')
@section('content')

    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- STORE -->
                <div id="store" class="col-md-12">

                    <!-- store products -->
                    <div class="row">

                        <!-- product -->
                        @foreach($favorites as $favorite)
                        @foreach(\App\Models\Products::where('id',$favorite->urun_id)->get() as $urun)
                                @foreach(\App\Models\Menus::where('id',$urun->menu_id)->get() as $menu)
                            <div class="clearfix visible-sm visible-xs"></div>
                            <div class="col-md-3 col-xs-4">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{\App\Models\Products::find($urun -> id) -> img_url}}" alt="">
                                        <div class="product-label">
                                            <span class="sale">-30%</span>
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{$menu->name}}</p>
                                        <h3 class="product-name"><a href="#">{{$urun->content}}</a></h3>
                                        <h4 class="product-price">$ {{number_format($urun->price,2,',','.')}}
                                            <del class="product-old-price">$ {{number_format($urun->price,2,',','.')}}</del></h4>

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
                            </div>
                        @endforeach
                    @endforeach
                    @endforeach
                    <!-- /product -->

                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">Showing 20-100 products</span>
                        <ul class="store-pagination">
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $.ajax({
                type:'get',
                url:'{{route('Front.favorite')}}',
            });
        });
    </script>
@endsection
