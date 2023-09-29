@extends("layouts.main")
@section("content")
    <!-- Inner Page Banner Area Start Here -->
    <div class="inner-page-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb-area">
                        <h1>@lang('cart.checkoutPage')</h1>
                        <ul>
                            <li><a class="fal fa-home" href="/"></a> /</li>
                            <li>@lang('cart.check')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Page Banner Area End Here -->
    <!-- Checkout Page Area Start Here -->
    <div class="checkout-page-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="billing-details-area">
                        <form id="checkout-form" action="{{ route('addOrder') }}" method="post" >
                            <h2 class="cart-area-title">@lang('account.shipping')<span>
                                <input type="checkbox" id="shipingAddress" name="remember" {{  $user->address  ? "" : 'checked' }}/></span></h2>
                            <div class="form-address" {{  $user->address  ? "style=display:none" : '' }}>
                                <div class="row">
                                   <!-- First Name -->
                                    <div class="col-sm-6 col-xs-12">
                                       <div class="form-group">
                                           <label class="control-label" for="first-name">@lang('account.firstName')
                                               *</label>
                                           <input type="text" name="first_name" id="first-name" class="form-control"
                                                  value="{{ $user->name }}">
                                       </div>
                                    </div>
                                    <!-- last Name -->
                                    <div class="col-sm-6 col-xs-12">
                                       <div class="form-group">
                                           <label class="control-label" for="last-name">@lang('account.lastName') *</label>
                                           <input type="text" name="last_name"  id="last-name" class="form-control"
                                                  value="{{ $user->surname }}">
                                       </div>
                                    </div>
                                    <!-- Email -->
                                    <div class="col-sm-6 col-xs-12">
                                       <div class="form-group">
                                           <label class="control-label" for="email">@lang('account.email') *</label>
                                           <input type="text" name="email" class="form-control" value="{{ $user->email }}" readonly>
                                       </div>
                                    </div>
                                    <!-- Phone -->
                                    <div class="col-sm-6 col-xs-12">
                                       <div class="form-group">
                                           <label class="control-label" for="phone">@lang('account.phone') *</label>
                                           <input type="number" id="phone" name="phone" class="form-control" value="{{ $user->phone }}">
                                           @if ($errors->has('phone'))
                                               <span class="invalid-feedback" role="alert">
                                                <strong class="registration_error">{{ $errors->first('phone') }}</strong>
                                            </span>
                                           @endif
                                       </div>
                                    </div>

                                    @if(isset($address))
                                    <!-- Address -->
                                    <div class="col-sm-6 col-xs-12">
                                       <div class="form-group">
                                           <label class="control-label" for="address">@lang('account.address')</label>
                                           <input type="text" name="address" id="address" class="form-control" value="{{ $address->address }}">
                                           @if ($errors->has('address'))
                                               <span class="invalid-feedback" role="alert">
                                                <strong class="registration_error">{{ $errors->first('address') }}</strong>
                                            </span>
                                           @endif
                                       </div>
                                    </div>
                                    <!-- Town / City -->
                                    <div class="col-sm-4 col-xs-12">
                                       <div class="form-group">
                                           <label class="control-label" for="city">@lang('account.town')</label>
                                           <input type="text" name="city" id="city" class="form-control" value="{{ $address->city }}">
                                           @if ($errors->has('city'))
                                               <span class="invalid-feedback" role="alert">
                                                <strong class="registration_error">{{ $errors->first('city') }}</strong>
                                            </span>
                                           @endif
                                       </div>
                                    </div>
                                    <!-- Postcode / ZIP -->
                                    <div class="col-sm-2 col-xs-12">
                                       <div class="form-group">
                                           <label class="control-label" for="postcode">@lang('account.postcode')</label>
                                           <input type="number" name="postcode" id="postcode" class="form-control" value="{{ $address->post_code }}">
                                           @if ($errors->has('postcode'))
                                               <span class="invalid-feedback" role="alert">
                                                <strong class="registration_error">{{ $errors->first('postcode') }}</strong>
                                            </span>
                                           @endif
                                       </div>
                                    </div>
                                        @else
                                        <!-- Address -->
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="address">@lang('account.address')</label>
                                                    <input type="text" name="address" id="address" class="form-control" value="">
                                                    @if ($errors->has('address'))
                                                        <span class="invalid-feedback" role="alert">
                                                <strong class="registration_error">{{ $errors->first('address') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- Town / City -->
                                            <div class="col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="city">@lang('account.town')</label>
                                                    <input type="text" name="city" id="city" class="form-control" value="">
                                                    @if ($errors->has('city'))
                                                        <span class="invalid-feedback" role="alert">
                                                <strong class="registration_error">{{ $errors->first('city') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- Postcode / ZIP -->
                                            <div class="col-sm-2 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="postcode">@lang('account.postcode')</label>
                                                    <input type="number" name="postcode" id="postcode" class="form-control" value="">
                                                    @if ($errors->has('postcode'))
                                                        <span class="invalid-feedback" role="alert">
                                                <strong class="registration_error">{{ $errors->first('postcode') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </div>
                                    @endif

                                    <div class="col-xs-12">
                                       <div class="form-group">
                                           <label class="control-label">@lang('account.notes')</label>
                                           <textarea class="form-control" name="description"
                                                     placeholder="@lang('account.example')"></textarea>
                                       </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="payment-option">
                                            <div class="form-group">
                                                <span><input type="checkbox" name="payment_method" value="Bank Payments" disabled/>@lang('cart.pay')</span>
                                            </div>
                                            <div class="form-group">
                                                <span><input type="checkbox" name="payment_method" value="Cash" checked/>@lang('cart.cash')</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                    @if(Session::has('cart'))
                                        <div class="order-sheet">
                                            <h2>@lang('cart.youOrder')</h2>
                                            <ul>
                                                <?php $i = 1; ?>
                                                <?php
                                                $lang = Session::get('applocale');
                                                if ($lang == 'am') {
                                                    $name = 'nameAm';
                                                } else if ($lang == 'ru') {
                                                    $name = 'nameRu';
                                                } else if ($lang == 'en') {
                                                    $name = 'nameEn';
                                                }
                                                $totalPrice = 0;

                                                ?>
                                                @foreach($products as $product)
                                                    <li>
                                                        {{ $i++ . "." }} {{ $product['productName']->$name }}
                                                        <span> = {{ $product['product']['price'] * $product['count'] }} @lang('home.amd')</span>
                                                        <?php

                                                        $totalPrice += $product['product']['price'] * $product['count'] ?>
                                                        <span> * {{  $product['count'] }}&nbsp;</span>
                                                        <span> {{ $product['product']['price'] }}&nbsp;</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <h3>@lang('cart.total')<span>{{ $totalPrice }} @lang('home.amd')</span></h3>
                                        </div>
                                    @endif
                                    </div>
                                    <div class="col-xs-12">
                                       <div class="pLace-order">
                                           <button class="btn-send-message disabled" type="submit"
                                                   value="Login">@lang('cart.order')</button>
                                       </div>
                                    </div>
                                 </div>
                                 {{ csrf_field() }}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Page Area End Here -->

    <script src="/js/checkOut.js"></script>
@endsection