@extends("layouts.main")
@section("content")
      
        <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumb-area">
                            <h1>@lang('cart.orderDetails')</h1>
                            <ul>
                                <li><a href="/">@lang('home.home')</a> /</li>
                                <li>@lang('cart.orderDetails')</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- Order Details Page Area Start Here -->
        <div class="order-details-page-area">
            <div class="container">
                <h2 class="order-details-page-title">@lang('cart.thankYou')</h2>
                <ul class="order-details-summery">
                    <li>@lang('cart.orderNumber'):<span>{{ $address->order_id }}</span></li>
                    <li>@lang('cart.orderDate'):<span>{{ date("F j, Y", strtotime($address->created_at)) }}</span></li>
                    <li>@lang('account.email'):<span>{{ $address->email }}</span></li>
                    <li>@lang('cart.method'):<span>
                            @if($address->payment_method == "Cash")
                                @lang('cart.cash')
                                @else
                                @lang('cart.pay')
                            @endif
                        </span>
                    </li>
                </ul>                              
                <div class="row">
                    <div class="col-xs-12">
                        <h3>@lang('cart.orderDetails')</h3>
                        <div class="order-details-page-top table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td class="order-details-form-heading">@lang('cart.product')</td>
                                        <td class="order-details-form-heading">@lang('cart.productSize')</td>
                                        <td class="order-details-form-heading">@lang('cart.productColor')</td>
                                        <td class="order-details-form-heading">@lang('cart.total')</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $total =0;
                                ?>
                                @foreach($orders as $order)
                                    <tr>
                                        <td><?php $lang = Session::get('applocale');
                                            if ($lang == 'am') {
                                            echo $order['ProductsName']->nameAm;
                                            } else if ($lang == 'ru') {
                                            echo $order['ProductsName']->nameRu;
                                            } else if ($lang == 'en') {
                                            echo $order['ProductsName']->nameEn;
                                            }
                                            ?></td>
                                        <td>
                                            <?php
                                            $size = explode(",", $order->size);
                                            foreach ($size  as $key) {
                                                echo "<span>".$key. " </span>";
                                            }

                                            ?>

                                        </td>
                                        <td>
                                            <?php
                                            $color = explode(";", $order->color);

                                            foreach ($color  as $key) {
                                                echo '<div style="background-color:'.$key.'; height: 20px;width: 20px; display:inline-block; margin-left: 5px"></div>';
                                            }

                                            ?>
                                        </td>
                                        <td>
                                            {{ $order->amount }} @lang('home.amd')
                                        <?php
                                            $total += $order->amount;
                                            ?>
                                        </td>
                                    </tr>
                                    @endforeach

                                    {{--<tr>--}}
                                        {{--<td><strong> Subtotals</strong></td>--}}
                                        {{--<td><strong> $460.00</strong></td>--}}
                                    {{--</tr> --}}
                                    <tr>  
                                        <td><strong>@lang('cart.method')</strong></td>
                                <td>

                                </td><td>

                                        </td>
                                        <td>
                                            <strong>
                                                @if($address->payment_method == "Cash")
                                                    @lang('cart.cash')
                                                @else
                                                    @lang('cart.pay')
                                                @endif
                                            </strong>
                                        </td>
                                    </tr>

                                    <tr>  
                                        <td><strong>@lang('cart.total')</strong></td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td><strong>{{ $total }} @lang('home.amd')</strong></td>
                                    </tr>                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <h3>@lang('account.shipping')</h3>
                        <div class="order-details-page-bottom">
                           <ul>
                                <li><strong>@lang('account.firstName'):</strong> {{ $address->first_name.' '.$address->last_name }}</li>
                                <li><strong>@lang('account.address'):</strong> {{ $address->address }}</li>
                                <li><strong>@lang('account.town'):</strong> {{ $address->city }}</li>
                                <li><strong>@lang('account.email'):</strong> {{ $address->email }}</li>
                                <li><strong>@lang('account.phone'):</strong> {{ $address->phone }}</li>
                           </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Order Details Page Area End Here -->
        <!-- Advantage Area Start Here -->
        <div class="advantage1-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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