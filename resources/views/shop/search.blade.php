@extends("layouts.main")
@section("content")

    <!-- Inner Pagpe Banner Area Start Here -->
    <div class="inner-page-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb-area">
                        <div class="breadcrumb-area">
                            <h1>@lang('home.searchResult')</h1>
                            <ul>
                                <li><a href="/">@lang('home.home')</a> /</li>
                                <li>@lang('home.searchResult')</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Page Banner Area End Here -->
    <!-- Shop Page Area Start Here -->
    <div class="shop-page-area">
        <div class="container">
            <div class="row products-container">
                @if(isset($products))
                    @foreach($products as $value)
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="product-box1">
                                <div class="product-img-holder">
                                    @if($value->product->status == '1')
                                        <span class="sticker new"><strong>@lang('home.new')</strong></span>
                                    @elseif($value->product->status == '2')
                                        <span class="hot"><img src="img/bestseller.png" alt=""></span>
                                    @elseif($value->product->status == '3')
                                        <span class="sticker sale"><strong>@lang('home.sale')</strong></span>
                                    @elseif($value->product->status == '4')
                                        <span class="sticker brand"><strong>@lang('home.brand')</strong></span>
                                    @endif
                                    <a href="/product-details/{{ $value->product->id }}" target="_blank">

                                        @if(gettype($value->product->images) =='string')
                                            <img src="/img/products/{{ $value->product->images }}" alt="product">
                                        @else
                                            <img src="/img/products/{{ $value->product->images[0] }}" alt="product">
                                        @endif

                                    </a>
                                </div>
                                <div class="product-content-holder">
                                    <h3>
                                        <a href="/product-details/{{ $value->id }}" target="_blank">
                                            <?php
                                            $lang = Session::get('applocale');
                                            if ($lang == 'am') {
                                                echo $value->nameAm;
                                            } else if ($lang == 'ru') {
                                                echo $value->nameRu;
                                            } else if ($lang == 'en') {
                                                echo $value->nameEn;
                                            }

                                            ?>
                                        </a>
                                    </h3>
                                    <ul class="feedback-ul">
                                        @for($i=1; $i<=5; $i++)
                                            @if(!empty($value->AverangeStars))

                                                @if($i <= $value->AverangeStars->rate)
                                                    <li><i class="fas fa-star"></i></li>
                                                @else
                                                    <li><i class="fal fa-star"></i></li>
                                                @endif
                                            @else
                                                <li><i class="fal fa-star"></i></li>
                                            @endif
                                        @endfor
                                    </ul>
                                    <div class="price-parent">
                                        <span class="main-price">{{ $value->product->price }}  @lang('home.amd')</span>
                                        <span class="saled-price">{{ $value->product->price }}  @lang('home.amd')</span>
                                    </div>
                                </div>
                                <a href="/product-details/{{ $value->product->id }}" target="_blank">@lang('product.prodMore')</a>
                            </div>
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
    <!-- Shop Page Area End Here -->




@endsection