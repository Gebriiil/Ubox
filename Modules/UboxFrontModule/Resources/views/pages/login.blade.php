@extends('uboxfrontmodule::layouts.master')

@section('content')


@push('javascript')

        <link rel="stylesheet" type="text/css" href="{{asset('/assets/front/css/notifIt.css')}}">

        <script src="{{ asset('/assets/front/js/notifIt.js') }}"></script>


        @if( session('error'))
            <script>

                notif({
                    msg: "<b>{{session('error')}}</b>",
                    type: "error"
                });


            </script>
        @endif

@endpush


    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">@lang('uboxfrontmodule::front.home')</a></li>
                <li class="active">@lang('uboxfrontmodule::front.login')</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->


    <div class="inner-login">

        <div class="container">
            <div class="row">
                <form method="POST" action="{{route('login')}}" id="content-login">
                    @csrf
                    <label for="exampleInputEmail1">@lang('uboxfrontmodule::front.phone')</label>
                    <input type="number" class="form-control" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputPassword1">@lang('uboxfrontmodule::front.password')</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    <div class="form-check">
                        <input type="checkbox" name="remember_me" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">@lang('uboxfrontmodule::front.remember_me')</label>
                    </div>
                    <span>
                        <a href="#" class="d-inline small green dir-right">@lang('uboxfrontmodule::front.forgot_password')?</a>
                        <a href="{{ route('register') }}" class="d-inline small green space">@lang('uboxfrontmodule::front.register')</a>
			        </span>

                    <div class="row"><button type="submit" class="btn-login">@lang('uboxfrontmodule::front.login')</button></div>
                </form>

            </div>


        </div>
    </div>



@stop
