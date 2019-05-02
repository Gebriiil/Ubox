@extends('uboxfrontmodule::layouts.master')

@section('content')
<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{route('home')}}">Home</a></li>
				<li class="active">About Us</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->
	
	
	<div class="content-about">
		<div class="row bottom">
			<div class="col-md-12 col-sm-12 col-xs-12"><img src="{{asset('public/img/slide1.png')}}"></div>
			<h4>@lang('uboxfrontmodule::front.description_us')</h4>
			<p>@lang('uboxfrontmodule::front.description_us2')</p>
			</div>
		<div class="service border-section small-section ">
            <div class="row">
                <div class="col-lg-3 col-sm-6 service-block">
                    <div class="service-space">
                       <img src="{{asset('public/img/truck.png')}}">
                        <h4>@lang('uboxfrontmodule::front.Free Shipping')</h4>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 service-block">
                    <div class="service-space">
                  
                       <img src="{{asset('public/img/support.png')}}">
                        <h4>@lang('uboxfrontmodule::front.Online Service')</h4>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 service-block">
                    <div class="service-space">
                      <img src="{{asset('public/img/24-hours-phone-service.png')}}">
                        <h4> @lang('uboxfrontmodule::front.Service') 24 </h4>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 service-block">
                    <div class="service-space">
                   <img src="{{asset('public/img/credit.png')}}">
                        <h4>@lang('uboxfrontmodule::front.Online Payment')</h4>
                    </div>
                </div>
            </div>
        </div>
	  
	</div>
	@stop