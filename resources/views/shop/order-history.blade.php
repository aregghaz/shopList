@extends("layouts.main")
@section("content")  
       <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumb-area">
                            <h1>@lang('home.orderHistory') @lang('home.page')</h1>
                            <ul>
                                <li><a class="fal fa-home" href="/"></a> /</li>
                                <li>@lang('home.orderHistory')</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- Order History Page Area Start Here -->
        <div class="order-history-page-area">
            <div class="container">               
                <div class="row">
                    <div class="col-xs-12">
                        <div class="order-history-page-top table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td class="order-history-form-heading">@lang('admin.orderId')</td>
                                        <td class="order-history-form-heading">@lang('admin.named')</td>
                                        <td class="order-history-form-heading">@lang('admin.addDate')</td>
                                        <td class="order-history-form-heading">@lang('admin.quantity')</td>
                                        <td class="order-history-form-heading">@lang('admin.amount')</td>
                                        <td class="order-history-form-heading">@lang('admin.status')</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>                                        
                                        <td>
                                            <a href="{{ route('orderDetails',['orderId' => $order->order_id]) }}">#{{ $order->order_id }}
                                                <i class="fa fa-paperclip" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/product-details/{{ $order->product_id }}">
                                                <?php
                                                $lang = Session::get('applocale');
                                                if ($lang == 'am') {
                                                    echo $order->productsName->nameAm;
                                                } else if ($lang == 'ru') {
                                                    echo $order->productsName->nameRu;
                                                } else if ($lang == 'en') {
                                                    echo $order->productsName->nameEn;

                                                }
                                                ?>


                                            </a>
                                        </td>
                                        <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                        <td>{{ $order->count }} Pcs</td>
                                        <td>{{ $order->amount }}</td>
                                        <td  class="{{ strtolower($order->status) }}">{{ $order->status }}</td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Order History Page Area End Here -->
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
       <!-- Advantage Area End Here -->

@endsection