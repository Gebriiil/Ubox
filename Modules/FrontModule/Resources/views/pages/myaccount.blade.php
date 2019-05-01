@extends('frontmodule::layouts.master')

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
                <li><a href="{{route('home')}}">@lang('frontmodule::front.home')</a></li>
                <li class="active">@lang('frontmodule::front.myaccount')</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <div class="content-account container">
        <div class="row" id="tabs">
            <div class="col-12 col-md-3 dir-right">
                <div class="table-tab">
                    <div class="header-account"><h2>@lang('frontmodule::front.myaccount')</h2></div>
                    <ul class="list-tabs">
                        <hr>
                        <li><a href="#tab-2">@lang('ordermodule::order.pagetitle')</a></li>
                        <hr>
                        <li><a href="#tab-3">@lang('frontmodule::front.address')</a></li>
                        <hr>
                        <li><a href="#tab-4">@lang('frontmodule::front.account_details')</a></li>
                        <hr>
                        <li><a href="#tab-5">@lang('frontmodule::front.wishlist')</a></li>
                    </ul>

                </div>
            </div>


            <div class="col-md-8 col-12 content-tab" id="tab-2">
                <div class="block-orders">

                    <table class="table">
                        <thead>
                        <tr class="bg-gray">
                            <th scope="col" class="text-right">@lang('frontmodule::front.order_id')</th>
                            <th scope="col" class="text-right">@lang('frontmodule::front.date')</th>
                            <th scope="col" class="text-right">@lang('productmodule::product.total')</th>
                            <th scope="col" class="text-right">@lang('frontmodule::front.status')</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse( user()->orders as $order )
                            <tr>
                                <th scope="row" class="text-right">{{$order->id}}</th>
                                <td>{{ $order->created_at }}</td>
                                <td>{{$order->total}}</td>
                                <td class="state"><p class="bg-green">{{$order->current_status}}</p></td>
                            </tr>
                        @empty
                            <tr>
                                <td>
                                    <div class="alert alert-danger">@lang('frontmodule::front.is_empty')</div>
                                </td>
                            <tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-md-8 col-12 content-tab" id="tab-3">

                @if(user()->address)
                    <div class="inner-tab">
                        <h3>@lang('frontmodule::front.billing_address')</h3>
                        <h4>{{ user()->first_name . ' ' . user()->last_name }}</h4>

                @endif

                @forelse( user()->address as $address )

                        <p>
                            {{$address->address}}
                        </p>
                        <p>@lang('frontmodule::front.phone'): {{$address->phone}}</p>

                        <hr>
                @empty

                    <div class="alert alert-danger">@lang('frontmodule::front.is_empty')</div>

                @endforelse


                 @if(user()->address)
                    </div>
                 @endif

            </div>

            <div class="col-md-8 col-12 content-tab" id="tab-4">
                <div class="inner-tab">
                    <h3>@lang('frontmodule::front.account_details')</h3>
                    <form action="{{route('update-profile')}}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="first_name" value="{{ user()->first_name }}" placeholder="@lang('frontmodule::front.first_name')">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="last_name" value="{{ user()->last_name }}" placeholder="@lang('frontmodule::front.last_name')">
                            </div>

                            <div class="col-md-12">
                                <input type="number" class="form-control" name="phone" value="{{ user()->phone }}" placeholder="@lang('frontmodule::front.phone')">
                            </div>

                            <h4>@lang('frontmodule::front.password_change')</h4>
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="current_password" placeholder="@lang('frontmodule::front.current_password')">
                            </div>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="new_password" placeholder="@lang('frontmodule::front.new_password')">
                            </div>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="confirmed_password" placeholder="@lang('frontmodule::front.confirm_password')">
                            </div>
                            <button type="submit" class="btn-edit-address left">@lang('productmodule::product.submit')</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-md-8 col-12 content-tab" id="tab-5">
                <div class="inner-tab">
                    <h3>@lang('frontmodule::front.wishlist')</h3>
                    <form id="checkout-form" class="clearfix">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="order-summary clearfix">

                                @include('frontmodule::pages.wishlist_content')

                            </div>

                        </div>
                    </form>
                </div>


            </div>

        </div>



    </div>

@stop
