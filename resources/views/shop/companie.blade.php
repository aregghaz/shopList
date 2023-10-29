@extends("layouts.company")
@section('content')
    <div class="custom-container">
        <div class="row">
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

                {{-- daily deal section in sidebar starts here--}}
                <div class="filter-range-wrapper">
                    {{-- Filter Area start here --}}
                    <h3>@lang('home.filterOptions')</h3>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1">@lang('home.priceRange')</a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <span id="filter-price" class="price_histogram">
                                       <span class="ui-label">@lang('home.price'):</span>
                                       <input class="ui-textfield ui-textfield-system" tabindex="20" name="minPrice" id="filter-price-from" autocomplete="off" price-range-from="" value="" placeholder="@lang('home.min')" data-spm-anchor-id="a2g0v.search0104.0.i1.5eea265bTrEQHF"> <span>-</span>
                                       <input class="ui-textfield ui-textfield-system" tabindex="20" name="maxPrice" id="filter-price-to" autocomplete="off" price-range-to="" value="" placeholder="@lang('home.max')" data-spm-anchor-id="a2g0v.search0104.0.i2.5eea265bTrEQHF">
                                    </span>
                                    <a href="javascript:;" class="ui-button narrow-go fal fa-angle-right" id="filter-submit"></a>

                                    <hr>
                                    <div class="free-shipping tuned-check">
                                        <input type="checkbox" id="free_shipping_check">
                                        <label for="free_shipping_check">@lang('home.freeShipping')</label>
                                    </div>

                                    <hr>
                                    <div class="rate-in-filter tuned-check">
                                        <input type="checkbox" id="rate_in_filter">
                                        <ul class="feedback-ul">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fal fa-star"></i></li>
                                        </ul>
                                        <label for="rate_in_filter">@lang('home.orMore')</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse2">Collapsible Group 2</a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse3">Collapsible Group 3</a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                            </div>
                        </div>
                    </div>

                    {{-- Filter Area end here --}}
                </div>
                {{-- daily deal section in sidebar end here--}}

                <div class="left-sdb-banner">
                    <a href="#" style="background-image:url('/img/testaram/addbanner.jpg');">
                        {{-- main page left sidebar 2 --}}
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-sm-8 main-right">
                <div class="row">
                    <div id="mainCarousel" class="col-sm-9 carousel slide carousel-fade company_carousel" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#mainCarousel" data-slide-to="1"></li>
                            <li data-target="#mainCarousel" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @if(!empty($company->img1))
                                <div class="item active">
                                    <a href="#companypage" class="sl-item-wrap"
                                       style="background-image:url('/img/slider/{{ $company->img1 }})"></a>
                                </div>
                            @endif
                            @if(!empty($company->img2))
                                <div class="item ">
                                    <a href="#companypage" class="sl-item-wrap"
                                       style="background-image:url('/img/slider/{{ $company->img2 }})"></a>
                                </div>
                            @endif
                            @if(!empty($company->img3))
                                <div class="item ">
                                    <a href="#companypage" class="sl-item-wrap"
                                       style="background-image:url('/img/slider/{{ $company->img3 }})"></a>
                                </div>
                            @endif
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
                    <div class="col-sm-3">
                        <div class="company-inf-sdbcol">
                            <div class="widget-ct widget-profile mb-30">
                                <div class="widget-s-title">
                                    <h4>Shop Details</h4>
                                </div>
                                <div class="info">
                                    <a href="{{ url('/companies/'.$company->name) }}" title="ShopList.am">
                                        <img src="/img/companies/{{ $company->logo }}" alt="shoplist-logo">
                                    </a>

                                    <h4 class="name">{{ $company->name }}</h4>
                                    <ul class="contacts-list">
                                        <li><i class="fal fa-phone"></i> 0800 123 4567</li>
                                        <li><i class="fal fa-envelope"></i> {{ $company->text_header }}</li>
                                    </ul>
                                    <p>{{ $company->text_button }}<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="product-area company">
                    <div class="row">
                        @if(isset($products))
                            @foreach($products as $value)
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    @include('include.product')
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
