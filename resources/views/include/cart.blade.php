<div class="cart-area">
    <ul>
        <?php $totalPrice = 0; $count = 0;?>
        @if(Session::has('cart'))
            @foreach(Session::get('cart') as $item)
                <li>
                    <div class="cart-single-product">
                        <div class="media">
                            <div class="pull-left cart-product-img">
                                <a href="#">
                                    @if(gettype($item['product']['images']) =='string')
                                        <img class="img-responsive seshomimg" alt="product"
                                             src="{{ asset('/img/products/'.$item['product']['images']) }}">
                                    @else
                                        <img class="img-responsive seshomimg" alt="product"
                                             src="{{ asset('/img/products/'.$item['product']['images'][0]) }}">
                                    @endif
                                </a>
                            </div>
                            <?php
                            $lang = Session::get('applocale');
                            if($lang == 'am'){
                                $name = 'nameAm';
                            }else if($lang == 'ru') {
                                $name = 'nameRu';
                            }else if($lang == 'en') {
                                $name= 'nameEn';
                            }
                            ?>
                            <div class="media-body cart-content">
                                <ul>
                                    <li>
                                        <h2><a href="#">{{ $item['productName']["$name"] }}</a></h2>
                                    </li>
                                    <li>
                                        <p>X{{ $item['count'] }}</p>
                                    </li>
                                    <li>
                                        <p>{{ $item['product']['price'] * $item['count'] }} @lang('home.amd')</p>
                                        <?php $totalPrice += $item['product']['price'] * $item['count'];$count++ ?>
                                    </li>
                                    <li>
                                        <a class="trash" href="#">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
            <li class="dropdown-df">
                <span><span>@lang('home.Total')</span></span><span>{{ $totalPrice ? $totalPrice : '0' }} @lang('home.amd')</span>
            </li>
            <li>
                <ul class="checkout">
                    <li>
                        <a href="{{ url('/shopping-cart') }}" class="btn-checkout">
                            <i class="fal fa-shopping-cart" aria-hidden="true"></i>
                            @lang('home.viewCart')
                        </a>
                    </li>
                    {{--<li>
                        <a href="{{ url('/check-out') }}" class="btn-checkout">
                            <i class="fa fa-share" aria-hidden="true"></i>@lang('home.Checkout')
                        </a>
                    </li>--}}
                </ul>
            </li>

        @endif

    </ul>
    <a href="{{ url('/shopping-cart') }}">
        <i class="fal fa-shopping-cart" aria-hidden="true"></i>
        <span>{{ $count ? $count : '0' }}</span>
    </a>

</div>