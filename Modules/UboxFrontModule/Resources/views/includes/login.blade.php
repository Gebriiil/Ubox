@push('javascript')


    <script>

        function checkBtn(){
            if ( $('#login_form input[name="email"]').val().length > 0 && $('#login_form input[name="password"]').val().length > 0 ){

                $('#login_form .btn-login').attr('disabled' , false);

            }
        }

        $('#login_form input[name="email"]').on('keyup' , function () {

            checkBtn();

        });

        $('#login_form input[name="password"]').on('keyup' , function () {

            checkBtn();

        });


        $('#login_form').validate({

            rules:{
                email:{
                    required:true,
                    email:true,
                    remote:'{{ url('/user-check-email-not-exist')  }}'
                },
                password:{
                    required:true,
                }
            },
            messages:{
                email:{
                    required:'{{ trans('frontmodule::front.email_is_required') }}',
                    email:'{{ trans('frontmodule::front.email_is_valid') }}',
                    remote:"{{ trans('frontmodule::front.email_is_not_exist')  }}"
                },
                password:{
                    required:'{{ trans('frontmodule::front.password_is_required') }}',

                }

            }

        });

    </script>

@endpush


<form id="login_form" method="POST" action="{{ route('login')  }}">

    @csrf

    <div id="content-login">
        <div class="right-arrow">@lang('frontmodule::front.login_form')</div>
        <div class="row icon-close"><i class="fa fa-times close-login" aria-hidden="true"></i></div>

        <div class="form-group">
        <label for="exampleInputEmail1">@lang('frontmodule::front.email')</label>
        <input type="email" name="email" class="form-control"
               aria-describedby="emailHelp">
        </div>

        <div class="form-group">
        <label for="exampleInputPassword1">@lang('frontmodule::front.password')</label>
        <input type="password" name="password" class="form-control" >
        </div>

        <div class="form-check form-group">
            <input type="checkbox" class="form-check-input" name="remember_me" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">@lang('frontmodule::front.remember_me')</label>
        </div>
        <span>
            <a href="#" class="d-inline small green">@lang('frontmodule::front.forgot_password')</a>
            <a href="{{ route('register')  }}" class="d-inline small green space">@lang('frontmodule::front.register')</a>
        </span>

        <div class="row">
            <button disabled class="btn-login">@lang('frontmodule::front.login')</button>
        </div>
    </div>
</form>
