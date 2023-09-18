@extends("layouts.main")
@section('title')
    @lang('home.aboutUs') - shoplist.am
@endsection
@section("content")
        <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumb-area">
                            <ul>
                                <li><a class="fal fa-home" href="/"></a> /</li>
                                <li>@lang('home.aboutUs')</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- About Us Page Area Start Here -->
        <div class="custom-container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="aboutUsRightWrap">
                        <img src="img/about-us.jpg" alt="about" class="img-responsive">
                        <h1>@lang('home.aboutUs')</h1>
                        @lang('about.aboutPlainText')
                    </div>
                </div>
            </div>
        </div>

        <div class="advantage1-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <div class="advantage-area-box">
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <i class="flaticon-truck"></i>
                                </a>
                                <div class="media-body">
                                    <p>@lang('home.fShipping')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="advantage-area-box">
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <i class="flaticon-headphones"></i>
                                </a>
                                <div class="media-body">
                                    <p>24/7 @lang('home.service')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="advantage-area-box">
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <i class="flaticon-reload"></i>
                                </a>
                                <div class="media-body">
                                    <p>100% @lang('home.moneyBack')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection