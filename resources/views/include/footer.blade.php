<footer>
    <div class="footer-area">
        <div class="footer-area-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-box">
                            <h3>@lang('home.information')</h3>
                            <ul class="info-list">
                                <li><a href="#RETURNPOLICY">@lang('home.returnPolicy')</a></li>
                                <li><a href="{{ url('/privacy-policy') }}">@lang('home.privacy')</a></li>
                                <li><a href="{{ url('/termsAndConditions') }}">@lang('home.terms')</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-box">
                            <h3>@lang('home.myAccount')</h3>
                            <ul class="info-list">
                                <li><a href="{{ url('/my-account') }}">@lang('home.myAccount')</a></li>
                               @if(Auth::guest())
                                <li><a href="{{ url('/sign') }}">@lang('home.login')</a></li>
                                @endif
                                <li><a href="{{ url('/order-history') }}">@lang('home.orderHistory')</a></li>
                                <li><a href="{{ url('wishList') }}">@lang('home.wishlist')</a></li>
                                <li><a href="{{ url('/cart') }}">@lang('home.cart')</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-box">
                            <h3>@lang('home.productTag')</h3>
                            <ul class="tag-list">
                                <li><a href="#">@lang('home.new')</a></li>
                                <li><a href="#">@lang('home.hot')</a></li>
                                <li><a href="#">@lang('home.sale')</a></li>
                                <li><a href="#">@lang('home.brand')</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-box">
                            <h3>@lang('home.Stay')</h3>
                            <ul class="info-list">
                                <li><a href="{{ url('/about') }}">@lang('home.aboutUs')</a></li>
                                <li><a href="{{ url('/contact')}}">@lang('home.contact')</a></li>
                            </ul>
                            <ul class="footer-social mt20">
                                <li><a href="https://www.facebook.com/Shoplistam-559959457837202/?modal=admin_todo_tour"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.facebook.com/Shoplistam-559959457837202/?modal=admin_todo_tour"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-xs-12">
                        <p>© 2019 <span>ShopList.am</span>
                            @lang('home.allright')<a href="http://fix-mysite.com/" target="_blank">http://fix-mysite.com/</a></p>
                    </div>
                    <div class="col-md-5 col-xs-12">
                        <ul class="payment-method">
                            <li>
                                <a href="#"><img src="{{ asset('img/payment/arca.png')}}" width="31px" height="21px" alt="online payment-method"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('img/payment/visa.png')}}"   width="31px" height="21px"  alt="online payment-method"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('img/payment/mastercard.png')}}"  width="31px" height="21px" alt="online payment-method"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('img/payment/edram.png')}}"  width="31px" height="21px" alt="online payment-method"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('img/payment/mobi.png')}}"  width="31px" height="21px" alt="online payment-method"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
