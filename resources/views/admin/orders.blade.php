@extends("layouts.admin")
@section('content')
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->
        <div class="col-md-xs-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="portlet-title box-header">
                        <h3 class="box-title">@lang('admin.products') </h3>
                    </div>
                </div>
                <?php $i = 1; ?>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="example1">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('admin.identificator')</th>
                            <th>@lang('admin.productName')</th>
                            <th>@lang('admin.quantity')</th>
                            <th>@lang('admin.totalAmount')</th>
                            <th>@lang('admin.size')</th>
                            <th>@lang('admin.userName')</th>
                            <th>@lang('admin.phone')</th>
                            <th>@lang('admin.address')</th>
                            <th>@lang('admin.shippingDate')</th>
                            <th>@lang('admin.status')</th>
                            <th>@lang('admin.created')</th>
                            <th class="action-th">@lang('admin.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($orders))
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $order->order_id }}</td>
                                    <td><a href="/product-details/{{ $order->ProductsName->id }}" target="_blank">
                                        <?php $lang = Session::get('applocale');
                                        if ($lang == 'am') {
                                            echo $order->ProductsName->nameRu;
                                        } else if ($lang == 'ru') {
                                            echo $order->ProductsName->nameRu;
                                        } else if ($lang == 'en') {
                                            echo $order->ProductsName->nameEn;
                                        }
                                        ?>
                                        </a>
                                    </td>
                                    <td>{{ $order->count }}</td>
                                    <td>{{ $order->amount }}</td>
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
                                    <td>{{ $order->Address->first_name .' '.$order->Address->last_name  }}</td>
                                    <td>{{ $order->Address->phone }}</td>
                                    <td>{{ $order->Address->address }}</td>

                                    <td>{{ $order->created_at->format('Y-m-d')   }}</td>
                                    <td  class="{{ strtolower($order->status) }}">{{ $order->status }}</td>
                                    <td>

                                        <button class="btn btn-success btn-xs edit_order" id="edit"
                                                data-toggle="modal"
                                                data-target="#showModal"
                                                data-id="{{ $order->id  }}"
                                                data-status="{{ $order->status  }}"
                                        >
                                            <i class="fa fa-edit btn-success"></i>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>

    <div class="modal fade" id="showModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>@lang('admin.identificator'): <span id="product_id"> </span> @lang('admin.postBy') : <span id="user_name"> </span></h4>
                </div>
                <input type="hidden" id="orderId">
                <div class="modal-body">
                    <select name="status" id="changeStatus">
                        <option value="Pending">Pending</option>
                        <option value="Processing">Processing</option>
                        <option value="Delivered">Delivered</option>
                        @if(Auth::User()->role == 'admin')
                        <option value="Complete">Complete</option>
                        <option value="Canceled">Canceled</option>
                        @endif
                        <option value="Refund">Refund</option>
                    </select>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.close')</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function() {

            console.log('1')
            jQuery('#changeStatus').on('change', function () {

                jQuery.ajax({
                    url: "/admin/changeStatus",
                    type: "get",
                    data: "status=" + jQuery('#changeStatus').val() + "&_token="+window.Laravel.csrfToken+ "&id="+jQuery('#orderId').val(),
                    success: function(data) {
                        window.location.reload()
                    }
                });
            })
        });



    </script>

    <script>
        $(function () {
            $("#example1").DataTable();

        });
    </script>

@endsection
