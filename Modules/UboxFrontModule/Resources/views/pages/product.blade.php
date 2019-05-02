@extends('uboxfrontmodule::layouts.master')

@section('content')

    @push('javascript')

    <link rel="stylesheet" type="text/css" href="{{asset('/assets/front/css/notifIt.css')}}">

    <script src="{{ asset('/assets/front/js/notifIt.js') }}"></script>



    @if( session('success'))
        <script>

            notif({
                msg: "<b>{{session('success')}}</b>",
                type: "success"
            });


        </script>
    @endif

@endpush
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">@lang('uboxfrontmodule::front.home')</a></li>
                <li><a>@lang('productmodule::product.products')</a></li>
                <li class="active">{{ $product->title }}</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
             @if($product)


                <!--  Product Details -->
                <div class="product product-details clearfix">
                    <div class="col-md-6">
                        <div id="product-main-view">
                            @foreach($product->product_photo as $photo)
                            <div class="product-view">
                                <img src="{{ asset('public/images/products/' . $photo->photo)}}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div id="product-view">
                            @foreach($product->product_photo as $photo)
                            <div class="product-view">
                                <img src="{{ asset('public/images/products/' . $photo->photo)}}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 product_{{ $product->id }}">
                        <div class="product-body">
                            <h2 class="product-name">{{$product->title}}</h2>
                            @if($product->offers and $product->offers->active == 1)
                                <h3 class="product-price">{{offer_price($product)['offer_price']}} <del class="product-old-price">{{$product->sell_price}}</del></h3>
                            @else
                                <h3 class="product-price">{{$product->sell_price}}</h3>
                            @endif
                            <div>
                                <div class="product-rating">
                                    @for($i = 1 ; $i <= 5 ; $i++)
                                    <i class="fa {{ $i <= $product->rating()  ? 'fa-star' : 'fa-star-o empty'}} "></i>
                                    @endfor
                                </div>
                                <a href="#review_system">{{ $product->rating() }} @lang('uboxfrontmodule::front.reviews')</a>
                            </div>

                            <p>{!!$product->description!!}</p>


                            <div class="product-btns">

                                <div class="qty-input dir-right">
                                    <span class="text-uppercase">@lang('productmodule::product.quantity'): </span>
                                    <input class="input product_qty" id="{{ $product->id }}" type="number" value="{{ $productInCart->qty ?? 0 }}">
                                </div>

                                <button  style="{{  checkInWishlist($product->id) }}"  id="{{$product->id}}" class="main-btn heart icon-btn"><i class="fa fa-heart"></i></button>

                                <button style="{{ checkInCart($product->id)["style"]}}" class="product_{{ $product->id}} primary-btn add-to-cart" id="{{ $product->id}}"><i class="fa fa-shopping-cart"></i> {{ checkInCart($product->id)["status"] ? trans('uboxfrontmodule::front.added_to_cart') : trans('uboxfrontmodule::front.add_to_cart') }}</button>
                                <form style="display: none" id="form{{$product->id}}" >

                                    {{ csrf_field()  }}

                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <input type="hidden" name="name" value="{{$product->title}}">
                                    <input type="hidden" name="price" value="{{ (offer_price($product)['offer_price']) ? : $product->sell_price }}">
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="product-tab">
                            <ul class="tab-nav">
                                <li class="active dir-right"><a data-toggle="tab" href="#tab1">@lang('uboxfrontmodule::front.description')</a></li>
                                <li style=" {{lang() == 'ar' ? 'direction: rtl' : ''}}" ><a data-toggle="tab" href="#tab2">@lang('uboxfrontmodule::front.reviews') ({{ $product->reviews()->count() }})</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab1" class="tab-pane fade in active">
                                    <p>{!!$product->description!!}</p>
                                </div>

                                <div id="tab2" class="tab-pane fade in">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="product-reviews">

                                                @foreach($product->Paginationreviews() as $review)
                                                    <div class="single-review">
                                                        <div class="review-heading">
                                                            <div><a href="#"><i class="fa fa-user-o"></i> {{  $review->name }}</a></div>
                                                            <div>
                                                                <a href="#">
                                                                    <i class="fa fa-clock-o"></i>
                                                                    {{  $review->created_at->diffForHumans() }}
                                                                </a>
                                                            </div>
                                                            <div class="review-rating pull-right">
                                                                @for($i = 0 ; $i < 5 ; $i++)
                                                                    <i class="fa {{  $i <= $review->rate ? "fa-star" : "fa-star-o empty" }} "></i>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <p>{{  $review->desc }}.</p>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <ul class="reviews-pages">
                                                    {{ $product->Paginationreviews()->links() }}
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-uppercase">@lang('uboxfrontmodule::front.write_your_review')</h4>

                                            <form class="review-form" action="{{ route('setrate') }}" method="post" >
                                                @csrf
                                                <div class="form-group">
                                                    <input class="input" type="text" placeholder="Your Name" name="name">
                                                </div>
                                                <div class="form-group">
                                                    <input class="input" type="phone" placeholder="Phone" name="phone">
                                                    <input  type="hidden" value="{{ $product->id }}" name="product_id">
                                                    <input  type="hidden" id="rate" name="rate">
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="input" placeholder="Your review" name="desc"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-rating">
                                                        <strong class="text-uppercase">@lang('uboxfrontmodule::front.your_rating'): </strong>
                                                        <div class="stars product-rating">

                                                            <input type="radio" id="star" name="rate" value="5" /><i data-value="5" class="fa fa-star-o"></i>
                                                            <input type="radio" id="star" name="rate" value="4" /><i data-value="4" class="fa fa-star-o"></i>
                                                            <input type="radio" id="star" name="rate" value="3" /><i data-value="3" class="fa fa-star-o"></i>
                                                            <input type="radio" id="star" name="rate" value="2" /><i data-value="2" class="fa fa-star-o"></i>
                                                            <input type="radio" id="star" name="rate" value="1" /><i data-value="1" class="fa fa-star-o"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="primary-btn" id="butn">@lang('uboxfrontmodule::front.send')</button>
                                            </form>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Product Details -->
            @endif
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
                        <h2 class="title">@lang('uboxfrontmodule::front.picked_for_you')</h2>
                    </div>
                </div>
                <!-- section title -->

                <!-- Product Single -->
                @foreach($PickedForYou as $product)
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> @lang('uboxfrontmodule::front.quick_view')</button>
                            <img src="{{ $product->photo_path }}" alt="">
                        </div>
                        <div class="product-body">
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
                           <h2 class="product-name"><a href="{{route('only_product' , $product->id)}}">{{$product->title}}</a></h2>


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

                <!-- /Product Single -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>

        $('.stars i').on('click', function(e) {

            var vote = $(this).data('value');

            $("#rate").val(vote);


            $('.stars i').each(function(index, el) {

                if ($(this).data('value') <= vote) {

                    $(this).addClass('fa-star').removeClass('fa-star-o');

                }else {

                    $(this).removeClass('fa-star').addClass('fa-star-o');
                }

            });

       });


    </script>

@stop
