@extends("layouts.main")
@section("content")
    <!-- Login Registration Page Area Start Here -->

    @if($newUser)
        <div class="alert-success alert-verify text-center" >
            <strong>
                @lang('email.hello') {{ $userName }}. @lang('email.verifyNotification')
            </strong>
            <a href="{{ route('resetPassword', ['id' =>$userId]) }}" class="btn btn-sm btn-info"> @lang('admin.resend')</a>
        </div>
    @endif
    @if($blockUser)
        <div class="alert-success alert-verify text-center">
            <strong>
                @lang('email.hello') {{ $userName }}. @lang('email.tooManyAttempts')
            </strong>
        </div>
    @endif
    <div class="login-registration-page-area">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-7 col-sm-offset-3 col-xs-12">
                    <div class="login-registration-field recoverPass">
                        <h2 class="cart-area-title">@lang('home.recover')</h2>
                        @if(!$changePassword)
                        <form method="post" action="{{ route('resetPassword') }}">
                            @csrf
                            <label for="login_email">@lang('home.enterYourEmail') *</label>
                            <input type="text" id="login_email"  name="login_email" value="{{ old('login_email') }}" placeholder="example@gmail.com" required >
                            @if ($errors->has('login_email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="registration_error">{{ $errors->first('login_email') }}</strong>
                                </span>
                            @endif
                            <br>
                            <button class="btn-send-message disabled" type="submit" value="Login">@lang('home.recover')</button>
                        </form>
                        @endif
                        @if($changePassword)
                        <form method="post" action="{{ route('restorePassword') }}">
                            @csrf
                            <input type="hidden" name="userId" value="{{ $id }}">
                            <label for="password">@lang('admin.password') *</label>
                            <input type="password" id="password"  name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="registration_error">{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                            <label for="password-confirm">@lang('admin.repeatPass') *</label>
                            <input type="password" id="password-confirm" name="password_confirmation" required >
                            <p>
                                <button class="btn-send-message disabled" type="submit" value="Login">@lang('home.recover')</button>
                            </p>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Registration Page Area End Here -->

@endsection