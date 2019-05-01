@extends('frontmodule::layouts.master')

@section('content')

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">@lang('frontmodule::front.home')</a></li>
                <li class="active">@lang('frontmodule::front.contact_us')</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->
        <div class="content-account container">

            <div class="container inner-contact">
                <div class="row">
              <div class="col-md-4">
                  <h3 class="header-contact">@lang('frontmodule::front.contact_us')</h3>
                  <span class="right" style="display: -webkit-inline-box">
                    <img src="{{asset('public/img/address.png')}}">
                    <h4 class="top">@lang('frontmodule::front.address')</h4>  
                  </span>
                  <p>@lang('frontmodule::front.MainStreet')123  , @lang('frontmodule::front.Egypt')</p>
                  <hr>
                    <span class="right" style="display:-webkit-inline-box">
                    <img src="{{asset('public/img/phone.png')}}">
                    <h4 class="top">@lang('frontmodule::front.phone')</h4>  
                  </span>
                  <p>@lang('frontmodule::front.phone'): (08) 123 456 789</p>
                  <hr>
                   <span class="right" style="display:-webkit-inline-box">
                    <img src="{{asset('public/img/email.png')}}">
                    <h4 class="top">@lang('frontmodule::front.email')</h4>  
                  </span>
                  <p>yourmail@domain.com</p>
                </div>
                  <div class="col-md-6">
                  <h3 class="header-contact">@lang('frontmodule::front.Tell Us Your Message')</h3>
                 <label for="exampleInputName">@lang('frontmodule::front.Your Name')<small>*</small></label>
    <input type="password" class="form-control" id="exampleInputName">  
         <label for="exampleInputEmail">@lang('frontmodule::front.Your Email')<small>*</small></label>
    <input type="email" class="form-control" id="exampleInputEmail">    
             <label for="exampleInputSubject">@lang('frontmodule::front.Subject')<small>*</small></label>
    <input type="text" class="form-control" id="exampleInputSubject">
         <label for="exampleInputMessage">@lang('frontmodule::front.Your Message')<small>*</small></label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>  
        <button class="btn-send btn-login">@lang('frontmodule::front.send')</button>              
                </div>
            </div>
    
            </div>
        
    
    </div>
@stop
