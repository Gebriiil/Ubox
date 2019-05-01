@extends('frontmodule::layouts.master')

@section('content')

@push('javascript')

    <script>

        $('.delBtn').on('click' , function (e) {

            e.preventDefault();

            var id = $(this).attr('id');
            var vm = $(this);


            $.ajax({

                url: "{{ url('/product/remove-from-wishlist') }}/" + id,
                type:"POST",
                data:{_token: "{{ csrf_token()  }}"},
                success:function (response) {

                    if (response.status == 'deleted'){

                        vm.parentsUntil('tr').parent().remove();

                    }

                },
                error:function (error) {
                    console.log(error);
                }

            })

        });

    </script>

@endpush

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">Home</a></li>
            <li class="active">@lang('frontmodule::front.wishlist')</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->
<div class="content-wishlist">
    <div class="container">
        <div class="row">
            <form id="checkout-form" class="clearfix">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">@lang('frontmodule::front.wishlist')</h3>
                        </div>
                        @include('frontmodule::pages.wishlist_content')

                    </div>

                </div>
            </form>
        </div>

    </div>
</div>

@stop
