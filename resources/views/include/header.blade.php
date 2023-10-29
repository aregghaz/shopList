<header>
    <div class="header-area-style3" id="sticker">
        <div class="header-top">
            <div class="header-top-inner-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-7 hidden-xs">
                            <div class="header-contact">
                                <ul>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i><a href="+1234567890"> + 123 456
                                            7890</a></li>
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> info@speedshop.am</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-5 col-xs-12">
                            <div class="account-wishlist">
                                <ul>
                                    @if(Auth::guest())
                                        <li><a href="{{ url('/sign') }}"><i class="fa fa-lock" aria-hidden="true"></i>
                                        @lang('home.account')</a></li>
                                    @else
                                        <li>
                                            <div class="dropdown">
                                                <a class="btn btn-secondary dropdown-toggle"
                                                   href="#"
                                                   id="dropdownMenuLink"
                                                   data-toggle="dropdown">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <span class="caret"></span>
                                                    {{ Auth::user()->name  }}
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ url('/my-account') }}" id="dropdown_a">@lang('home.myAccount')</a></li>
                                                    <li class="logout__"><a href="{{ url('/logout') }}" id="dropdown_b">@lang('home.logOut')</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endif
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            {{ Config::get('languages')[App::getLocale()] }}
                                        </a>
                                        <ul class="dropdown-menu lang-ul">
                                            @foreach (Config::get('languages') as $lang => $language)
                                                @if ($lang != App::getLocale())
                                                    <li class="flag">
                                                        <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-top-inner-bottom">
                <div class="custom-container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="logo-area">
                                <a href="{{ url('/') }}" title="speedshop.am">
                                    <img src="/img/logo5.svg" alt="speedshop.am">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="search-area">
                                <form action="{{ route('searchProduct') }}" method="post">
                                    <div class="input-group" id="adv-search">
                                        <input type="text" class="form-control" name="searchWord" placeholder="@lang('home.searchProduct')"/>
                                        <div class="input-group-btn">
                                            <div class="btn-group" role="group">
                                                <div class="dropdown dropdown-lg search-cat-dd">
                                                    <button type="button"
                                                            class="btn btn-metro dropdown-toggle"
                                                            data-toggle="dropdown"
                                                            aria-expanded="false">
                                                        <span>@lang('home.allCategories')</span>
                                                        <i class="fa fa-caret-up" aria-hidden="true"></i>
                                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" id="searchCategory" role="menu">
                                                        <ul class="sidenav-nav">
                                                            @if(isset($category))
                                                                @foreach($category as $value)
                                                                    <li value="{{ $value->id }}" title="{{ $value->name }}">
                                                                        <a data-id="{{ $value->id }}" title="{{ $value->name }}">{!! $value->icon !!} {{ $value->name }}</a>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                                {{ csrf_field() }}
                                                <input type="hidden" name="categoryId" id="categoryId">
                                                <button type="submit" class="btn btn-metro-search"><span
                                                            class="fal fa-search" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            <div class="main-menu-area">
                                <nav>
                                    <ul>
                                        <li {{ isset($home)? 'class=active' : '' }}><a href="{{ url('/') }}">@lang('home.home')</a>
                                        </li>
                                        <li {{ isset($about) ? 'class=active' : '' }}><a href="{{ url('/about')}}">@lang('home.aboutUs')</a></li>
                                        <li {{ isset($contact) ? 'class=active' : '' }}><a href="{{ url('/contact')}}">@lang('home.contact')</a></li>
                                        {{--<li><a href="#">Նվերներ</a></li>--}}
                                        <li {{ isset($menuteg) ? 'class=active' : '' }}><a href="{{ url('/productByTag/new') }}">@lang('home.newLong')</a></li>
                                        {{--<li><a href="#">Խանութներ</a></li>--}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6 buttons-for-mobile">
                            <ul class="header-cart-area">
                                <li class="whishlist-li">
                                    <a href="{{ url('wishList') }}" {{  Session::has('wish') ? "style=color:#EC1B24" : ' ' }}>
                                        <i class="fal fa-heart" aria-hidden="true" ></i>
                                    </a>
                                </li>
{{--                                <li class="cartLi">--}}
{{--                                    @include('include.cart')--}}

{{--                                </li>--}}
                                <li class="bars-li"><span class="far fa-bars menu-bars"></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
