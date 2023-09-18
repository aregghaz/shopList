@extends("layouts.main")
@section('title')
    @lang('cart.cartPage')
@endsection
@section("content")

    <!-- Inner Page Banner Area Start Here -->
    <div class="inner-page-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb-area">
                        <h1>@lang('cart.cartPage')</h1>
                        <ul>
                            <li><a class="fal fa-home" href="/"></a>/</li>
                            <li>@lang('cart.cart')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Page Banner Area End Here -->
    <!-- Cart Page Area Start Here -->
    <div class="cart-page-area">
        <div class="custom-container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="cart-page-top table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="cart-form-heading"><input type="checkbox" id="checkAll" title="check All"></th>
                                <th class="cart-form-heading" colspan="2">@lang('cart.product')</th>
                                <th class="cart-form-heading">@lang('cart.productSize')</th>
                                <th class="cart-form-heading">@lang('cart.productColor')</th>
                                <th class="cart-form-heading">@lang('cart.price')</th>
                                <th class="cart-form-heading">@lang('cart.quantity')</th>
                                <th class="cart-form-heading">@lang('cart.total')</th>
                                <th class="cart-form-heading">@lang('cart.order')</th>
                                <th class="cart-form-heading">@lang('cart.remove')</th>
                            </tr>
                            </thead>
                            <tbody id="quantity-holder">
                            @if(Session::has('cart'))
                                <?php
                                $lang = Session::get('applocale');
                                if ($lang == 'am') {
                                    $name = 'nameAm';
                                } else if ($lang == 'ru') {
                                    $name = 'nameRu';
                                } else if ($lang == 'en') {
                                    $name = 'nameEn';
                                }
                                ?>
                                <?php $totalPrice = 0; $count=0; ?>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="product-checkBox" name="product" value="{{ $count }}" title="add Product">

                                        </td>
                                        <td class="cart-img-holder">
                                            @if(gettype($product['product']['images']) =='string')
                                                <a href="{{ url('/product-details/'.$product['product']['id']) }}">
                                                    <img src="{{ asset('/img/products/'.$product['product']['images']) }}"
                                                         alt="cart" class="img-responsive">
                                                </a>
                                            @else
                                                <a href="{{ url('/product-details/'.$product['product']->id) }}">
                                                    <img src="{{ asset('/img/products/'.$product['product']['images'][0]) }}"
                                                         alt="cart" class="img-responsive">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <h3>
                                                <a href="{{ url('/product-details/'.$product['product']->id) }}">{{  $product['productName'][$name]  }}</a>
                                            </h3>
                                        </td>
                                        <td>
                                            <span>
                                             <?php
                                                $size = explode(",", $product['size']);
                                                foreach ($size  as $key) {
                                                    echo "<span>".$key. " </span>";
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php
                                            $color = explode(";", $product['color']);
                                            foreach ($color  as $key) {
                                                echo '<div style="background-color:'.$key.'; height: 20px;width: 20px; display:inline-block; margin-left: 5px"></div>';
                                            }
                                            ?>
                                        </td>
                                        <td class="amount amount-single">
                                            <span>{{ $product['product']['price'] }}</span> @lang('home.amd')</td>
                                        <td class="quantity">
                                            <div class="input-group quantity-holder">
                                                <input type="text" name='quantity' class="form-control quantity-input"
                                                       value="{{ $product['count'] }}" placeholder="1">
                                                <div class="input-group-btn-vertical">
                                                    <button class="btn btn-default quantity-plus" type="button">+
                                                    </button>
                                                    <button class="btn btn-default quantity-minus" type="button">-
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="amount amount-total">
                                            <span class="amount-price">{{ $product['product']['price'] * $product['count'] }}</span> @lang('home.amd')
                                            <?php $totalPrice +=$product['product']['price'] * $product['count']; ?>
                                        </td>
                                        <td>
                                            <input type="hidden" class="productId" value="{{ $product['product']['id'] }}">
                                            <a class="order-now" data-id="{{ $count }}">
                                                @lang('product.order')
                                            </a>
                                        </td>
                                        <td class="dismiss">
                                            <a href="{{ route('deleteCheckoutProdcut', ['id' => $count, 'cmd'=> 'deleteByID']) }}">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $count++;?>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="cart-page-bottom-right">
                        <h2>@lang('cart.total')</h2>
                        <h3>@lang('cart.total')
                            @if(Session::has('cart'))
                                <span id="totalPrice">
                                    {{ $totalPrice }}
                                    @lang('home.amd')
                                </span>
                            @endif
                        </h3>

                        <div class="proceed-button">
                            <button class="btn-apply-coupon disabled" type="submit" onClick="window.location.reload()">
                                @lang('cart.updateCart')
                            </button>
                            <button class="btn-apply-coupon">@lang('cart.checkout')</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var token = '{{  Session::token() }}';
    </script>
    <!-- Cart Page Area End Here -->
    <script src="/js/cart.js"></script>
@endsection