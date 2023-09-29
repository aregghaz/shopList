<div class="product-box1">
    <div class="product-img-holder">
        @if($value->status == '1')
            <span class="sticker new"><strong>@lang('home.new')</strong></span>
        @elseif($value->status == '2')
            <span class="hot"><img src="img/bestseller.png" alt="">{{--<strong>@lang('home.hot')</strong>--}}</span>
        @elseif($value->status == '3')
            <span class="sticker sale"><strong>@lang('home.sale')</strong></span>
        @elseif($value->status == '4')
            <span class="sticker brand"><strong>@lang('home.brand')</strong></span>
        @endif
        <a href="/product-details/{{ $value->id }}" target="_blank">

            @if(gettype($value->images) =='string')
                <img src="/img/products/{{ $value->images }}" alt="product">
            @else
                <img src="/img/products/{{ $value->images[0] }}" alt="product">
            @endif

        </a>
    </div>
    <div class="product-content-holder">
        <h3>
            <a href="/product-details/{{ $value->id }}" target="_blank">
                <?php
                $lang = Session::get('applocale');
                if ($lang == 'am') {
                    echo $value->productName->nameAm;
                } else if ($lang == 'ru') {
                    echo $value->productName->nameRu;
                } else if ($lang == 'en') {
                    echo $value->productName->nameEn;
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
            <span class="main-price">{{ $value->sku }}  @lang('home.amd')</span>
            <span class="saled-price">{{ $value->price }}  @lang('home.amd')</span>
        </div>
    </div>
    <a href="/product-details/{{ $value->id }}" target="_blank">@lang('product.prodMore')</a>
</div>