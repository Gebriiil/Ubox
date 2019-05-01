@extends('frontmodule::layouts.master')

@section('content')


    <div id="home">
        <!-- container -->
        <div class="container">
            <!-- home wrap -->
            <div class="home-wrap">
                <!-- home slick -->
                <div id="home-slick">
                    @forelse($offers_limit as $offer)
                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src=" {{ asset($offer->product->photo_path) }}" alt="">
                        <div class="banner-caption text-center">
                            <h1>Bags sale</h1>
                            <h3 class="white-color font-weak">Up to 50% Discount</h3>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                    <!-- /banner -->
                    @empty
                     @foreach($products_limit as $product)
                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src=" {{ asset($product->photo_path) }}" alt="">
                        <div class="banner-caption text-center">
                            <h1>Bags sale</h1>
                            <h3 class="white-color font-weak">Up to 50% Discount</h3>
                            <a href="{{route('only_product',$product->id)}}" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <!-- /banner -->
                     @endforeach
                    @endforelse
                </div>
                <!-- /home slick -->
            </div>
            <!-- /home wrap -->
        </div>
        <!-- /container -->
    </div>

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- banner -->
                <!-- <div class="col-md-3 col-sm-6">
                    <a class="banner banner-1" href="#">
                        <img src="{{ asset('assets/front/') }}/img/banner10.jpg" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">NEW COLLECTION</h2>
                        </div>
                    </a>
                </div> -->                <!-- /banner -->
 <!-- banner -->
                @foreach($categories as $category)
                <div class="col-md-3 col-sm-6">
                    <a class="banner banner-1" href="#">
                        <img src="{{ asset('public/images/category/' . $category->photo) }}" style="height:200px" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">{{$category->title}}</h2>
                        </div>
                    </a>
                </div>
                @endforeach
                <!-- /banner -->


    <!-- /section -->

    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title"> @lang('frontmodule::front.offers') </h2>
                    </div>
                </div>
                <!-- section title -->
                @forelse($offers as $offer)
                <?php
                    $old_price = $offer->product->sell_price;
                    $new_price = $offer->offer_price;
                    $divi = $old_price - $new_price;
                    $percent = round($divi / $old_price * 100, 1);
                ?>


                 <!-- Product Single -->
                 <div class="col-md-3 col-sm-6 col-xs-6  product_{{ $offer->product->id }}">
                    <div class="product product-single">
                        <div class="product-thumb">

                            <a href="{{route('only_product' , $offer->product->id)}}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> @lang('frontmodule::front.quick_view')</a>
                            <img src="{{ asset('public/images/products/' . $offer->product->photo) }}" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">${{$new_price}} <del class="product-old-price">${{$old_price}}</del></h3>
                            <div class="product-rating">
                                @for($i = 1 ; $i <= 5 ; $i++)
                                    <i class="fa {{ $i <= $offer->product->review()  ? 'fa-star' : 'fa-star-o empty'}} "></i>
                                @endfor
                            </div>
                            <h2 class="product-name"><a href="#">{{$offer->product->title}}</a></h2>
                            <div class="product-btns">
                                <button  style="{{  checkInWishlist($offer->product->id) }}"  id="{{$offer->product->id}}" class="main-btn heart icon-btn"><i class="fa fa-heart"></i></button>
                                <button style="{{checkInCart($offer->product->id)["style"]}}" class="product_{{$offer->product->id}} primary-btn add-to-cart" id="{{$offer->product->id}}"><i class="fa fa-shopping-cart"></i> {{checkInCart($offer->product->id)["status"] ? trans('frontmodule::front.added_to_cart') : trans('frontmodule::front.add_to_cart') }}</button>
                                <form style="display: none" id="form{{ $offer->product->id}}" >

                                    {{ csrf_field()  }}

                                    <input type="hidden" name="id" value="{{  $offer->product->id}}">
                                    <input type="hidden" name="name" value="{{ $offer->product->title}}">
                                    <input type="hidden" name="price" value="{{ offer_price($offer->product)['offer_price'] ?? $product->sell_price }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>


    <!-- section -->
    <div class="section section-grey" id="video">
        <!-- container -->
        <div class="container">
<!-- row viedo -->
            <div class="row hidden-xs hidden-sm hidden-md">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Top viedo</h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-2 custom-dots">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- section title -->


                <!-- Product Slick -->
                <div class="col-md-12 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-3" class="product-slick">
                            <!-- Product Single -->
                            <div class="product product-single">
                                <div>

                                      @foreach($videos as $video)
                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$video->code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        @endforeach

                                </div>

                            </div>
                            <!-- /Product Single -->

                        </div>
                    </div>
                </div>
                <!-- /Product Slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">@lang('frontmodule::front.latest_products')</h2>
                    </div>
                </div>
                <!-- section title -->
            @foreach($products_limit as $product)


                 <!-- Product Single -->
                 <div class="col-md-3 col-sm-6 col-xs-6  product_{{ $product->id }}">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <a href="{{route('only_product' , $product->id)}}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> @lang('frontmodule::front.quick_view')</a>
                            <img src="{{ $product->photo_path }}" alt="">
                        </div>
                        <div class="product-body">
                            @if($product->offers and $product->offers->active == 1)
                            <h3 class="product-price">{{ offer_price($product)['offer_price']}} <del class="product-old-price">{{$product->sell_price}}</del></h3>
                            @else
                                <h3 class="product-price">{{$product->sell_price}}</h3>
                            @endif
                            <div class="product-rating">
                                @for($i = 1 ; $i <= 5 ; $i++)
                                    <i class="fa {{ $i <= $product->review()  ? 'fa-star' : 'fa-star-o empty'}} "></i>
                                @endfor
                            </div>
                            <h2 class="product-name"><a href="#">{{$product->title}}</a></h2>
                            <div class="product-btns">
                                <button  style="{{  checkInWishlist($product->id) }}"  id="{{  $product->id}}" class="main-btn heart icon-btn"><i class="fa fa-heart"></i></button>

                                <button style="{{checkInCart($product->id)["style"]}}" class="product_{{$product->id}} primary-btn add-to-cart" id="{{$product->id}}"><i class="fa fa-shopping-cart"></i> {{checkInCart($product->id)["status"] ? trans('frontmodule::front.added_to_cart') : trans('frontmodule::front.add_to_cart') }}</button>
                                <form style="display: none" id="form{{$product->id}}" >

                                    {{ csrf_field()  }}

                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <input type="hidden" name="name" value="{{$product->title}}">
                                    <input type="hidden" name="price" value="{{ offer_price($product)['offer_price'] ?? $product->sell_price }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@stop
