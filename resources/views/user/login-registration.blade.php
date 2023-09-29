@extends("layouts.main")
@section("content")
        <!-- Login Registration Page Area Start Here -->
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                <h5 class="text-center"> {{ session('message') }}</h5>
            </div>
        @endif
        @if($newUser)
        <div class="alert-success alert-verify text-center" >
             <strong>
                 @lang('email.hello') {{ $userName }}, @lang('email.verifyNotification')
             </strong>
             <a href="{{ route('resendEmail', ['id' =>$userId]) }}" class="btn btn-sm btn-info"> @lang('home.resend')</a>
        </div>
        @endif
        @if($blockUser)
        <div class="alert-success alert-verify text-center" >
             <strong>
                 @lang('email.hello') {{ $userName }}. @lang('email.tooManyAttempts')
             </strong>
        </div>
        @endif
        <div class="login-registration-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-offset-3">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#sign-in-tab" class="fal fa-sign-in"> @lang('admin.signIn')</a></li>
                            <li><a data-toggle="tab" href="#sign-up-tab" class="fal fa-key"> @lang('admin.signUp')</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="sign-in-tab" class="tab-pane fade in active">
                                <div class="login-registration-field login">
                                    <form method="post" action="{{ url('/signIn') }}">
                                        @csrf

                                        <label for="email">@lang('admin.usernameOrEmail') *</label>
                                        <input type="text" id="email"  name="email" value="{{ old('email') }}" required >
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong class="registration_error">{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif

                                        <label for="password">@lang('admin.password') *</label>
                                        <input type="password" id="password"  name="password" required >
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong class="registration_error">{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                        <p class="forget-remember-p">
                                    <span>
                                        <input type="checkbox" name="remember" id="remember-check"><label
                                                for="remember-check">@lang('admin.rememberMe')</label>
                                    </span>
                                            <a href="{{ url('/forgot-password') }}" class="forgot-pass">@lang('admin.lostMyPassword')</a>
                                        </p>
                                        <button class="btn-send-message disabled" type="submit" value="Login">@lang('admin.signIn')</button>
                                    </form>
                                </div>
                            </div>

                            <div id="sign-up-tab" class="tab-pane fade">
                                <div class="login-registration-field registration">
                                    <form method="POST" action="{{ url('/signUp') }}" >
                                        <div class="row">
                                            @csrf
                                            <div class="col-sm-6">
                                                <label for="name">@lang('admin.firstName') *</label>
                                                <input type="text" name="name"  id="name" value="{{ old('name') }}" required>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong class="registration_error">{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="email">@lang('admin.emailAddress') *</label>
                                                <input type="text" id="email"  name="email" value="{{ old('email') }}" required >
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong class="registration_error">{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="surname">@lang('admin.signlastName') *</label>
                                                <input type="text" id="surname"  name="surname" value="{{ old('surname') }}" required>
                                                @if ($errors->has('surname'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong class="registration_error">{{ $errors->first('surname') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="password">@lang('admin.password') *</label>
                                                <input type="password" id="password"  name="password" required>
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong class="registration_error">{{ $errors->first('password') }}</strong>
                                            </span>
                                                @endif
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="phone">@lang('admin.phoneNumber') *</label>
                                                <input type="text" id="phone" name="phone"  value="{{ old('phone') }}" required />
                                                @if ($errors->has('phone'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong class="registration_error">{{ $errors->first('phone') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="password-confirm">@lang('admin.repeatPass') *</label>
                                                <input type="password" id="password-confirm" name="password_confirmation" required >
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <button class="btn-send-message disabled" type="submit" value="Login">@lang('admin.signUp')</button>
                                            </div>
                                        </div>
                                    </form>
                                    {{--                            <div class="container">--}}
                                    {{--                                <div class="row">--}}
                                    {{--                                    <div class="col-md-12 row-block">--}}
                                    {{--                                        <a href="{{ url('auth/facebook') }}" class="btn btn-lg btn-primary btn-block">--}}
                                    {{--                                            <strong>Login With Facebook</strong>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
                                    {{--                            </div>--}}
                                    {{--                            <div class="col-md-8 offset-md-4">--}}
                                    {{--                                <button type="submit" class="btn btn-primary">--}}
                                    {{--                                    {{ __('Login') }}--}}
                                    {{--                                </button>--}}
                                    {{--                                <a href="{{ url('/redirect') }}" class="btn btn-primary">Login With Google</a>--}}

                                    {{--                            </div>--}}
                                    {{--                        </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Registration Page Area End Here -->

        @endsection
