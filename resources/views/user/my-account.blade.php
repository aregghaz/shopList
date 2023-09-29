@extends("layouts.main")
@section("content")



    <!-- Inner Page Banner Area Start Here -->
    <div class="inner-page-banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumb-area">
                            <h1>@lang('account.account')</h1>
                            <ul>
                                <li><a class="fal fa-home" href="/"></a> /</li>
                                <li>@lang('account.account')</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Inner Page Banner Area End Here -->
        <!-- My Account Page Area Start Here -->
        <div class="my-account-page-area">

            <div class="container">               
                <div class="woocommerce">               
                    <div class="row">
                        <div class="col-md-3 col-xs-12">
                            <nav class="woocommerce-MyAccount-navigation">
                                <ul>
                                    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard active">
                                        <a href="#orders" data-toggle="tab" aria-expanded="false">@lang('account.orders')</a>
                                    </li>
                                    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
                                        <a href="#details" data-toggle="tab" aria-expanded="false">@lang('account.Details')</a>
                                    </li>
                                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'client')
                                    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
                                        <a href="/admin/dashboard" aria-expanded="false">@lang('account.ControlPanel')</a>
                                    </li>
                                    @endif
                                    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
                                        <a href="{{ url('/logout') }}" >@lang('home.logOut')</a>
                                    </li>

                                </ul>
                            </nav>                        
                        </div>
                        <div class="col-md-9 col-xs-12">
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="orders">
                                    <div class="woocommerce-message">
                                        <p>@lang('account.order')</p>
                                        <a class="woocommerce-Button button go-to-shop" href="/"> @lang('account.shop')</a>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="details">                                    
                                    <div class="woocommerce-MyAccount-content"> 
                                        <header class="row woocommerce-Address-title title">
                                            <h3 class="col-xs-12 metro-title">@lang('account.Details')</h3>
                                        </header>   
                                        <form class="row woocommerce-EditAccountForm edit-account" action="{{ url('/updateuser') }}" method="post">
                                            @csrf
                                            <p class="col-md-6 col-sm-12 woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="name" id="account_first_name" value="{{ $user->name }}" placeholder="@lang('account.firstName')" required />
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="registration_error">{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </p>
                                            <p class="col-md-6 col-sm-12 woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="surname" id="account_last_name" value="{{$user->surname }}" placeholder="@lang('account.lastName')" required />
                                                @if ($errors->has('surname'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="registration_error">{{ $errors->first('surname') }}</strong>
                                                    </span>
                                                @endif
                                            </p>
                                            <div class="clear"></div>
                                            <p class="col-md-6 col-sm-12 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="email" id="account_email" value="{{ $user->email }}" placeholder="@lang('account.email')" required />
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="registration_error">{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </p>
                                            <p class="col-md-6 col-sm-12 woocommerce-form-row woocommerce-form-row--wide form-row form-row-phone">
                                                <input type="text" class="woocommerce-Input woocommerce-Input--email input-text" name="phone" id="account_phone" value="{{ $user->phone }}" placeholder="@lang('account.phone')" required />
                                                @if ($errors->has('phone'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="registration_error">{{ $errors->first('phone') }}</strong>
                                                    </span>
                                                @endif
                                            </p>
                                            <div class="clear"></div>
                                            <p class="col-md-6 col-sm-12 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <input type="text" class="woocommerce-Input woocommerce-Input--email input-text" name="country" id="account_country" value="{{ $user->country }}" placeholder="@lang('account.town')" required />
                                                @if ($errors->has('country'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="registration_error">{{ $errors->first('country') }}</strong>
                                                    </span>
                                                @endif
                                            </p>


                                            <p class="col-md-6 col-sm-12 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <input type="text" class="woocommerce-Input woocommerce-Input--email input-text" name="address" id="account_address" value="{{ $user->address }}" placeholder="@lang('account.address')" required />
                                                @if ($errors->has('address'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="registration_error">{{ $errors->first('address') }}</strong>
                                                    </span>
                                                @endif
                                            </p>
                                            <p class="col-md-6 col-sm-12 woocommerce-form-row woocommerce-form-row--wide form-row form-row-phone">
                                                <input type="text" class="woocommerce-Input woocommerce-Input--email input-text" name="post_code" id="account_zip" value="{{ $user->post_code }}" placeholder="@lang('account.postcode')" required />
                                                @if ($errors->has('post_code'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="registration_error">{{ $errors->first('post_code') }}</strong>
                                                    </span>
                                                @endif
                                            </p>
                                            <div class="clear"></div>

                                            {{--<fieldset class="col-xs-12">
                                                <legend>Password change</legend>
                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="password_current">Current password (leave blank to leave unchanged)</label>
                                                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current">
                                                </p>
                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="password_1">New password (leave blank to leave unchanged)</label>
                                                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1">
                                                </p>
                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="password_2">Confirm new password</label>
                                                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2">
                                                </p>
                                            </fieldset>--}}

                                            <p class="col-xs-12">
                                                <input type="submit" class="woocommerce-Button button btn-shop-now-fill" name="save" value="@lang('account.changes')">
                                            </p>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>  
                    </div>  
                </div>
            </div>
        </div>


        <!-- My Account Page Area End Here -->
        @endsection