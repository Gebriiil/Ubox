@extends('uboxfrontmodule::layouts.master')

@section('content')

    <!-- Start Header -->
<div class="fables-header fables-after-overlay">
    <div class="container"> 
         <h2 class="fables-page-title fables-second-border-color text-rtl">@lang('uboxfrontmodule::front.contact_us')</h2>
    </div>
</div>  
<!-- /End Header -->
     
<!-- Start Breadcrumbs -->
<div class="fables-light-background-color">
    <div class="container"> 
        <nav aria-label="breadcrumb">
          <ol class="fables-breadcrumb breadcrumb px-0 py-3">
            <li class="breadcrumb-item"><a href="index.html" class="fables-second-text-color">@lang('uboxfrontmodule::front.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('uboxfrontmodule::front.contact_us')</li>
          </ol>
        </nav> 
    </div>
</div>
<!-- /End Breadcrumbs -->
     
<!-- Start page content --> 
    <div class="container  fables-counter"> 
            <div class="row overflow-hidden">
                <div class="col-12 col-md-10 offset-md-1 mt-5">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 text-center mb-5 mb-md-0 wow fadeInDown" data-wow-delay=".5s">
                            <span class="fables-iconmap-icon fa-3x fables-main-text-color fables-second-hover-color"></span> 
                            <h2 class="font-16 semi-font fables-main-text-color my-3">@lang('uboxfrontmodule::front.Address Information')</h2>
                            <p class="font-14 fables-forth-text-color">
                            level13, 2Elizabeth St, Melbourne,Victor 2000</p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 text-center mb-5 mb-md-0 wow fadeInDown" data-wow-delay=".8s">
                            <span class="fables-iconphone fa-3x fables-main-text-color fables-second-hover-color"></span>
                            <h2 class="font-16 semi-font fables-main-text-color my-3">@lang('uboxfrontmodule::front.Mail & Phone number')</h2>
                            <p class="font-14 fables-forth-text-color">wieboxplus@gmail.com</p>
                            <p class="font-14 fables-forth-text-color">0128328688</p>

                        </div>
                        <div class="col-12 col-sm-6 col-md-4 text-center mb-5 mb-md-0 wow fadeInDown" data-wow-delay="1.1s">
                            <span class="fables-iconshare-icon fa-3x fables-main-text-color fables-second-hover-color"></span>
                            <h2 class="font-16 semi-font fables-main-text-color my-3">@lang('uboxfrontmodule::front.Stay In Touch')</h2>
                            <ul class="nav fables-contact-social-links"> 
                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f fables-forth-text-color fa-fw"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-instagram fables-forth-text-color  fa-fw"></i></a></li> 
                                <li><a href="#" target="_blank"><i class="fab fa-twitter fables-forth-text-color    fa-fw"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-linkedin fables-forth-text-color   fa-fw"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-0 mb-5 my-md-5"> 
                        <h3 class="font-35 font-weight-bold fables-main-text-color text-center">@lang('uboxfrontmodule::front.contact_us')</h3>
                   

                    </div> 
                    
                    
                </div>
            </div>        
               
        <div class="row mb-4 mb-md-5 overflow-hidden dir-right">
                <div class="col-12 col-sm-6 wow fadeInLeft">
                    <form class="fables-contact-form" method="post" action="{{ route('send') }}">
                      
                      @csrf
                      <div class="form-group"> 
                        <input type="text" class="form-control rounded-0 p-3" name="name" placeholder="{{__('uboxfrontmodule::front.Your Name')}}">   
                      </div>
                      <div class="form-group"> 
                        <input type="email" class="form-control rounded-0 p-3" name="email" placeholder="{{__('uboxfrontmodule::front.Your Email')}}">
                      </div>
                      <div class="form-group"> 
                        <input type="text" class="form-control rounded-0 p-3" name="subject" placeholder="{{__('uboxfrontmodule::front.Subject')}}">   
                      </div>
                      <div class="form-group"> 
                          <textarea class="form-control rounded-0 p-3" name="message" placeholder="Message" rows="3">@lang('uboxfrontmodule::front.Your Message')</textarea>
                      </div>                       
                      <button type="submit" class="btn fables-second-background-color rounded-0 text-white btn-block p-3">@lang('uboxfrontmodule::front.send')</button>
                    </form>
                </div>
                <div class="col-12 col-sm-6 wow fadeInRight">
                    <div id="map" data-lng="31.248848" data-lat="29.966324" data-icon="assets/custom/images/map-marker.png" data-zom="12" style="width:100%;height:420px"></div>
                </div>
        </div>        
    </div> 
<!-- /End page content -->
@stop
