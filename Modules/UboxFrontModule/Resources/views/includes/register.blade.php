@push('javascript')

    <script type="application/javascript" src="{{ asset('/assets/front/js/jquery.validate.min.js') }}"></script>
    <script type="application/javascript" src="{{ asset('/assets/front/js/additional-methods.min.js') }}"></script>

    <script>

        $.validator.setDefaults({

            errorClass:'help-block',

            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },

            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            }

        });


    </script>

    <script>

        $.validator.addMethod('strongPassword' , function (value , element) {

            return value.length >= 6 ;

        } , '{{ trans('frontmodule::front.invalid_password') }}' );


        $.validator.addMethod('strongName' , function (value , element) {

            if ( value && value.length >= 3 ){
                return true;
            }

            return false;

        } , '{{ trans('frontmodule::front.invalid_name') }}' );

        $('#register_form').validate({

            rules:{
                first_name:{
                    required:true,
                    strongName:true

                },
                last_name:{
                    required:true,
                    strongName:true
                },
                email:{
                    required:true,
                    email:true,
                    remote:'{{ url('/user-check-email')  }}'
                },
                password:{
                    required:true,
                    strongPassword:true
                },
                confirmed_password:{
                    required:true,
                    strongPassword:true,
                    equalTo:"#exampleInputPassword1"
                }
            },
            messages:{
                first_name:{
                    required:'{{ trans('frontmodule::front.first_name_is_required') }}',
                },
                last_name:{
                    required:'{{ trans('frontmodule::front.last_name_is_required') }}',
                },
                email:{
                    required:'{{ trans('frontmodule::front.email_is_required') }}',
                    email:'{{ trans('frontmodule::front.email_is_valid') }}',
                    remote:"{{ trans('frontmodule::front.email_is_exist')  }}"
                },
                password:{
                    required:'{{ trans('frontmodule::front.password_is_required') }}',

                },
                confirmed_password:{
                    equalTo:'{{ trans('frontmodule::front.password_not_same') }}',
                    required:'{{ trans('frontmodule::front.confirmed_password_is_required') }}',

                }
            }

        });

    </script>

@endpush

<form id="register_form" action="{{  route('register') }}" method="POST">
    @csrf
    <div id="content-register">
        <div class="right-arrow">@lang('frontmodule::front.register_form')</div>
        <div class="row icon-close"><i class="fa fa-times close-register" aria-hidden="true"></i>
        </div>

        <div class="form-group">

        <label for="exampleInputFname">@lang('frontmodule::front.first_name')</label>
        <input type="text" value="{{ old('first_name')  }}" class="form-control" name="first_name" id="exampleInputFname">

        </div>

        <div class="form-group">

        <label for="exampleInputLname">@lang('frontmodule::front.last_name')</label>
        <input type="text" value="{{ old('last_name')  }}" class="form-control" name="last_name" id="exampleInputLname">
        </div>


        <div class="form-group">

        <label for="exampleInputEmail1">@lang('frontmodule::front.email')</label>
        <input type="email" class="form-control" value="{{ old('email')  }}" name="email" id="exampleInputEmail1"
               aria-describedby="emailHelp">
        </div>


        <div class="form-group">
        <label for="exampleInputPassword1">@lang('frontmodule::front.password')</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>


        <div class="form-group">
        <label for="exampleInputConfirmPassword">@lang('frontmodule::front.confirm_password')</label>
        <input type="password" name="confirmed_password" class="form-control" id="exampleInputConfirmPassword">
        </div>

        <div class="row">
            <button class="btn-register">@lang('frontmodule::front.register')</button>
        </div>
    </div>

</form>
