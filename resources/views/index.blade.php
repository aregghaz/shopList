@extends("layouts.main")
<link rel="home" href="http://shoplist.am" />
@section('content')
    <!-- Slider Area Start Here -->
    <div class="custom-container homepage">
        <div class="row rel">
            <div class="col-lg-3 col-sm-4 sidebar-col">
                <div class="sidebar hidden-before-tab">
                    <div class="category-menu-area sidebar-section-margin" id="category-menu-area">
                        <h4 class="categories-all">
                            <a href="{{ route('allProduct')}}">@lang('home.allCategories')</a>
                            <span class="fal fa-times"></span>
                        </h4>
                        <ul>
                            <?php
                            $lang = Session::get('applocale');
                            ?>
                            @if(isset($category) )
                                @foreach($category as $value)
                                    <li>
                                        <a href="{{ route('category', ['category' => $value->id]) }}" title="{{ $value->name }}">{!! $value->icon !!}{{ $value->name }}</a>
                                        <ul class="dropdown-menu">
                                            @foreach($subCategory as $key)
                                                <?php
                                                if ($lang == 'am') {
                                                    $subCategoryLang = $key->category_am_id;
                                                } else if ($lang == 'ru') {
                                                    $subCategoryLang = $key->category_ru_id;
                                                } else if ($lang == 'en') {
                                                    $subCategoryLang = $key->category_id;
                                                }

                                                ?>
                                                @if($subCategoryLang == $value->id)
                                                    <li>
                                                        <a href="{{ route('category', ['category' =>$value->id, 'subCategory' =>  $key->id]) }}" title="{{ $key->name }}">{{ $key->name }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>

                {{--<div class="left-sdb-banner">
                    <a href="#" style="background-image:url('/img/testaram/addbanner.jpg');">
                        --}}{{-- main page left sidebar 2 --}}{{--
                    </a>
                </div>--}}
                <div class="offer-area1 mt80">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="brand-area-box-l">
                                <h2 class="fal fa-percent">@lang('home.specialOffers')</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 ">
                        <div class="row">
                            <div id="countdown"></div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="row">
                            <div id="spec-offer-carousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                {{--<ol class="carousel-indicators">
                                    <li data-target="#spec-offer-carousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#spec-offer-carousel" data-slide-to="1"></li>
                                    <li data-target="#spec-offer-carousel" data-slide-to="2"></li>
                                </ol>--}}

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <?php $count = 0?>
                                    @foreach($sale as $value)

                                        <div class="item {{ $count== 0 ? 'active':'' }}">
                                            @include('include.product')
                                        </div>
                                        <?php $count++?>
                                    @endforeach
                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#spec-offer-carousel" data-slide="prev">
                                    <span class="fal fa-angle-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#spec-offer-carousel" data-slide="next">
                                    <span class="fal fa-angle-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <a href="#view all daily deals" class="btn-shop-now-fill">@lang('home.view')</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-sm-8 main-right">
                <div id="mainCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#mainCarousel" data-slide-to="1"></li>
                        <li data-target="#mainCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active main-item" style="background-image:url('/img/main-headingbg.jpg');">
                            <div>
                                <div>
                                    <h1>@lang('home.mainHeadingText')</h1>
                                    <p>
                                        <a href="#">@lang('home.lMore')</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a href="#companypage" class="sl-item-wrap"
                               style="background-image:url('/img/phenix.jpg');"></a>
                        </div>
                        {{--<div class="item">
                            <a href="#companypage" class="sl-item-wrap"
                               style="background-image:url('/img/testaram/slide.jpg');"></a>
                        </div>--}}
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#mainCarousel" data-slide="prev">
                        <span class="fal fa-angle-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="right carousel-control" href="#mainCarousel" data-slide="next">
                        <span class="fal fa-angle-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                {{-- products start here --}}
                {{-- new products start here --}}
                <div class="product-area">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section-title-m">
                                <h2>@lang('home.newArrivals')</h2>
                                <a href="{{ url('productByTag/new') }}">@lang('home.view')</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($new as $value)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 rain">
                                @include('include.product')
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- new products ends here --}}
                {{-- sales products start here --}}
                <div class="product-area">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section-title-m">
                                <h2>@lang('home.discounted')</h2>
                                <a href="{{ url('productByTag/sale') }}">@lang('home.view')</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($sale as $value)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 rain">
                                @include('include.product')
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- sales products start here --}}
                {{-- best sellers products start here --}}
                <div class="product-area">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section-title-m">
                                <h2>@lang('home.bestproducts')</h2>
                                <a href="{{ url('productByTag/best-product') }}">@lang('home.view')</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($best as $value)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 rain">
                                @include('include.product')
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- best sellers products end here --}}
                {{-- products ends here --}}
            </div>
        </div>
    </div>
    <!-- Product 2 Area Start Here -->
    <div class="product-area mt80">
        <div class="custom-container" id="home-isotope">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title">
                        <span class="title-bar-left"></span>
                        <h2>@lang('home.tagCategories')</h2>
                        <span class="title-bar-right"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="isotop-classes-tab myisotop2">
                        <a class="current" data-filter="*" href="#">@lang('home.all')</a>
                        <a data-filter=".new" href="#" class="">@lang('home.new')</a>
                        {{--<a data-filter=".brand" href="#" class="">@lang('home.brand')</a>--}}
                        <a data-filter=".hot" href="#" class="">@lang('home.hot')</a>
                        <a data-filter=".sale" href="#" class="">@lang('home.sale')</a>
                    </div>
                </div>
            </div>
            <div class="row featuredContainer">
                @foreach($products as $value)
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12
                @if($value->status == '1')
                    {{ 'new' }}
                    @elseif($value->status == '2')
                    {{ 'hot' }}
                    @elseif($value->status == '3')
                    {{ 'sale' }}
                    @elseif($value->status == '4')
                    {{ 'brand' }}
                    @endif
                            ">
                        @include('include.product')
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="advantage1-area">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="advantage-area-box">
                        <div class="media">
                            <div class="pull-left adv-div">
                                <i class="flaticon-truck"></i>
                            </div>
                            <div class="media-body">
                                <p>@lang('home.fShipping')</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="advantage-area-box">
                        <div class="media">
                            <div class="pull-left adv-div">
                                <i class="flaticon-headphones"></i>
                            </div>
                            <div class="media-body">
                                <p>24/7 @lang('home.service')</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="advantage-area-box">
                        <div class="media">
                            <div class="pull-left adv-div">
                                <i class="flaticon-reload"></i>
                            </div>
                            <div class="media-body">
                                <p>100% @lang('home.moneyBack')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Advantage Area End Here -->

    <!-- Solid Divider Area Start Here -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="solid-divider"></div>
            </div>
        </div>
    </div>
    <!-- Solid Divider Area End Here -->
    <!-- Brand Area Start Here -->
    <div class="brand-area">
        <div class="container">
            <div class="owl-carousel">
                @foreach($companies as $companie)
                    <div class="brand-area-box">
                        <a href="{{ url('/companies/'.$companie->name) }}">
                            <img src="/img/companies/{{ $companie->logo }}" alt="brand">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

