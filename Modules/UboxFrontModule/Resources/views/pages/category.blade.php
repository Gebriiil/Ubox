@extends('uboxfrontmodule::layouts.master')

@section('content')

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">@lang('uboxfrontmodule::front.home')</a></li>
                <li><a>@lang('productmodule::category.category')</a></li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->
<!---->
    <!-- section -->    z
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">


                    <!-- /aside widget -->

                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">@lang('uboxfrontmodule::front.top_rated_product')</h3>
                        <!-- widget product -->
                        @foreach($topRatedProduct as $product)
                            <div class="product product-widget">
                                <div class="product-thumb" style="    margin-left: 15px;">
                                    <img src="{{ $product->photo_path }}" alt="" style="{{lang() == 'ar' ? 'margin-left: 10px' : 'margin-left: -10px'}}">
                                </div>
                                <div class="product-body">
                                    <h2 class="product-name"><a href="{{route('only_product' , $product->id)}}">{{$product->title}}</a></h2>


                                    @if($product->offers and $product->offers->active == 1)
                                        <h3 class="product-price">
                                            {{offer_price($product)['offer_price']}}@lang('uboxfrontmodule::front.le') <del class="product-old-price">{{$product->sell_price}}@lang('uboxfrontmodule::front.le')</del></h3>
                                    @else
                                        <h3 class="product-price">{{$product->sell_price}} @lang('uboxfrontmodule::front.le')</h3>
                                    @endif


                                    <div class="product-rating">
                                        @for($i = 1 ; $i <= 5 ; $i++)
                                            <i class="fa {{ $i <= $product->rating()  ? 'fa-star' : 'fa-star-o empty'}} "></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <!-- /widget product -->
                    </div>
                    <!-- /aside widget -->
                </div>
                <!-- /ASIDE -->

                <!-- MAIN -->
                <div id="main" class="col-md-9">


                    <!-- STORE -->
                    <div id="store">
                        <!-- row -->
                        <div class="row">
                        @foreach($category->Paginationproducts() as $product)

                                <div class="col-md-4 col-sm-6 col-xs-6 product_{{$product->id}}">
                                    <div class="product product-single">
                                        <div class="product-thumb">
                                            <a href="{{route('only_product' , $product->id)}}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> @lang('uboxfrontmodule::front.quick_view')</a>
                                            <img src="{{ $product->photo_path }}" alt="">
                                        </div>
                                        <div class="product-body">
                                            @if($product->offers and $product->offers->active == 1)
                                                <h3 class="product-price">{{offer_price($product)['offer_price']}}@lang('uboxfrontmodule::front.le') <del class="product-old-price">{{$product->sell_price}}@lang('uboxfrontmodule::front.le')</del></h3>
                                            @else
                                                <h3 class="product-price">{{$product->sell_price}} @lang('uboxfrontmodule::front.le')</h3>
                                            @endif
                                            <div class="product-rating">
                                                    @for($i = 1 ; $i <= 5 ; $i++)
                                                    <i class="fa {{ $i <= $product->rating()  ? 'fa-star' : 'fa-star-o empty'}} "></i>
                                                    @endfor
                                            </div>
                                                <h2 class="product-name" style="display: block"><a href="{{route('only_product' , $product->id)}}">{{$product->title}}</a></h2>
                                            <div class="product-btns">
                                                <button  style="{{  checkInWishlist($product->id) }}"  id="{{$product->id}}" class="main-btn heart icon-btn"><i class="fa fa-heart"></i></button>

                                        <button style="{{checkInCart($product->id)["style"]}}" class="product_{{$product->id}} primary-btn add-to-cart" id="{{$product->id}}"><i class="fa fa-shopping-cart"></i> {{checkInCart($product->id)["status"] ? trans('uboxfrontmodule::front.added_to_cart') : trans('uboxfrontmodule::front.add_to_cart') }}</button>
                                                <form style="display: none" id="form{{$product->id}}" >

                                                    {{ csrf_field()  }}

                                                    <input type="hidden" name="id" value="{{$product->id}}">
                                                    <input type="hidden" name="name" value="{{$product->title}}">
                                                    <input type="hidden" name="price" value="{{ (offer_price($product)['offer_price']) ? : $product->sell_price }}">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach
                            <div class="clearfix visible-sm visible-xs"></div>


                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /STORE -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">

                        <div class="pull-right">
                          <ul class="store-pages">
                                {{ $category->Paginationproducts()->links() }}
                            </ul>
                        </div>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /MAIN -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@stop
