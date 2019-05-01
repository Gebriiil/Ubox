@extends('frontmodule::layouts.master')

@section('content')
<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{route('home')}}">Home</a></li>
				<li class="active">Products</li>
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
				<!-- MAIN -->
				<div id="main" class="col-md-12">
					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
						@foreach($offers as $offer)
							<!-- Product Single -->
							<div class="col-md-3 col-sm-6 col-xs-6 product_{{$offer->product->id}}">
                                    <div class="product product-single">
                                        <div class="product-thumb">
                                            <a href="{{route('only_product' , $offer->product->id)}}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> @lang('frontmodule::front.quick_view')</a>
                                            <img src="{{ $offer->product->photo_path }}" alt="">
                                        </div>
                                        <div class="product-body">
                                            
                                                <h3 class="product-price">{{$offer->offer_price}} <del class="product-old-price">{{$offer->product->sell_price}}</del></h3>
                                            <div class="product-rating">
                                                    @for($i = 1 ; $i <= 5 ; $i++)
                                                    <i class="fa {{ $i <= $offer->product->rating()  ? 'fa-star' : 'fa-star-o empty'}} "></i>
                                                    @endfor
                                            </div>
											<h2 class="product-name" style="display: block"><a href="{{route('only_product' , $offer->product->id)}}">{{$offer->product->title}}</a></h2>
                                            <div class="product-btns">
                                                <button  style="{{  checkInWishlist($offer->product->id) }}"  id="{{$offer->product->id}}" class="main-btn heart icon-btn"><i class="fa fa-heart"></i></button>

                                        <button style="{{checkInCart($offer->product->id)["style"]}}" class="product_{{$offer->product->id}} primary-btn add-to-cart" id="{{$offer->product->id}}"><i class="fa fa-shopping-cart"></i> {{checkInCart($offer->product->id)["status"] ? trans('frontmodule::front.added_to_cart') : trans('frontmodule::front.add_to_cart') }}</button>
                                                <form style="display: none" id="form{{$offer->product->id}}" >

                                                    {{ csrf_field()  }}

                                                    <input type="hidden" name="id" value="{{$offer->product->id}}">
                                                    <input type="hidden" name="name" value="{{$offer->product->title}}">
													<input type="hidden" name="price" value="{{ (offer_price($offer->product)['offer_price']) ? : $offer->product->sell_price }}">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							<!-- /Product Single -->
						@endforeach							
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

					
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
	@stop