@extends('uboxfrontmodule::layouts.master')

@section('content')


    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">@lang('uboxfrontmodule::front.home')</a></li>
                <li class="active">@lang('uboxfrontmodule::front.register')</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->


    <form action="{{route('register')}}" method="POST" class="inner-login">
        @csrf
        <div class="container">
            <div class="row">

                <div id="content-register">
                    <label for="exampleInputFname">@lang('uboxfrontmodule::front.first_name')</label>
                    <input type="text" name="first_name" class="form-control" id="exampleInputFname">
                    <label for="exampleInputLname">@lang('uboxfrontmodule::front.last_name')</label>
                    <input type="text" name="last_name" class="form-control" id="exampleInputLname">
                    <label for="exampleInputEmail1">@lang('uboxfrontmodule::front.phone')</label>
                    <input type="number" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputPassword1">@lang('uboxfrontmodule::front.password')</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    <label for="exampleInputConfirmPassword">@lang('uboxfrontmodule::front.confirm_password')</label>
                    <input type="password" name="confirmed_password" class="form-control" id="exampleInputConfirmPassword">
                    <div class="row"><button class="btn-register">@lang('uboxfrontmodule::front.register')</button></div>
                </div>

            </div>


        </div>
    </form>


@stop
