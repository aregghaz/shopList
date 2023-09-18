@extends("layouts.main")
@section('title')
    @lang('home.wishlist')
@endsection
@section("content")
    <!-- Inner Page Banner Area Start Here -->
    <div class="inner-page-banner-area">
        <div class="custom-container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb-area">
                        <h1>@lang('home.wishlist')</h1>
                        <ul>
                            <li><a class="fal fa-home" href="/"></a> /</li>
                            <li>@lang('home.wishlist')</li>
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
                        <table class="table table-hover whishlist-table">
                            <thead>
                            <tr>
                                <th class="cart-form-heading"><input type="checkbox"></th>
                                <th class="cart-form-heading" colspan="2">@lang('cart.product')</th>
                                <th class="cart-form-heading">@lang('cart.productSize')</th>
                                <th class="cart-form-heading">@lang('cart.productColor')</th>
                                <th class="cart-form-heading">@lang('cart.price')</th>

                                <th class="cart-form-heading">@lang('cart.quantity')</th>
                                <th class="cart-form-heading">@lang('cart.total')</th>
                                <th class="cart-form-heading">@lang('cart.cart')</th>
                                <th class="cart-form-heading">@lang('cart.remove')</th>
                            </tr>
                            </thead>
                            <tbody id="quantity-holder">
                            @if(Session::has('wish'))
                                @foreach($wish as $value)
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
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td class="cart-img-holder">
                                            @if(gettype($value['product']->images) =='string')
                                                <a href="{{ url('/product-details/'.$value['product']->id) }}">
                                                    <img src="{{'/img/products/'.$value['product']->images}}"
                                                         alt="{{ $value['productName']->$name }}">
                                                </a>
                                            @else
                                                <a href="{{ url('/product-details/'.$value['product']->id) }}">
                                                    <img src="{{'/img/products/'.$value['product']->images[0]}}"
                                                         alt="{{ $value['productName']->$name }}">
                                                </a>
                                            @endif
                                        </td>

                                        <td>
                                            <h3>
                                                <a href="{{ url('/product-details/'.$value['product']->id) }}">{{ $value['productName']->$name }}</a>
                                            </h3>
                                        </td>
                                        <td>
                                            <span>
                                             <?php
                                                $size = explode(",", $value['size']);
                                                foreach ($size as $key) {
                                                    echo "<span>" . $key . " </span>";
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php
                                            $color = explode(";", $value['color']);
                                            foreach ($color as $key) {
                                                echo '<div style="background-color:' . $key . '; height: 20px;width: 20px; display:inline-block; margin-left: 5px"></div>';
                                            }
                                            ?>
                                        </td>
                                        <td class="amount amount-single">
                                            <span>{{ $value['product']->price }}</span> @lang('home.amd')</td>
                                        <td class="quantity">
                                            <div class="input-group quantity-holder">
                                                <input type="text" name='quantity' class="form-control quantity-input"
                                                       value="{{ $value['count']}}" placeholder="1">
                                                <div class="input-group-btn-vertical">
                                                    <button class="btn btn-default quantity-plus" type="button">+
                                                    </button>
                                                    <button class="btn btn-default quantity-minus" type="button">-
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="amount amount-total"><span
                                                    class="amount-price">{{ $value['product']->price * $value['count'] }}</span> @lang('home.amd')
                                        </td>
                                        <td>
                                            <a
                                                    data-count="{{  $value['count'] }}"
                                                    data-color="{{ $value['color'] }}"
                                                    data-id="{{ $value['product']->id }}"
                                                    data-size="{{ $value['size'] }}"

                                                    class="add-to-cart">
                                                <i aria-hidden="true" class="fal fa-shopping-cart"></i>
                                            </a>
                                        </td>
                                        <td class="dismiss"><a href="{{ url('/deleteWish/'.$value['product']->id) }}"><i
                                                        class="fa fa-times" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page Area End Here -->
    <script src="/js/wishlist.js">

    </script>
@endsection