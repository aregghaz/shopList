@extends("layouts.admin")
@section('content')

    <div class="page-content">
        <!-- Content Wrapper. Contains page content -->
            <!-- Main content -->
            <div class="row">
                <div class="col-xs-12">
                    @if (session('product'))
                        <div class="alert alert-success" role="alert">
                            <h5 class="text-center"> {{ session('product') }}</h5>
                        </div>
                    @endif
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title box-header">
                            <h3 class="box-title">@lang('admin.tableWithHotBadgeItems')</h3>
                        </div>
                    <?php $i = 1; ?>
                    <!-- /.box-header -->
                        <div class="portlet-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('admin.theName')</th>
                                    <th>@lang('admin.category')</th>
                                    <th>@lang('admin.subCategory')</th>
                                    <th>@lang('admin.price')</th>
                                    <th>@lang('admin.sku')</th>
                                    <th>@lang('admin.inStock')</th>
                                    <th>@lang('admin.size')</th>
                                    <th>@lang('admin.created')</th>
                                    <th>@lang('admin.action')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($featureds))
                                    @foreach($featureds as $product)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->CategoryProduct->name }}</td>
                                            <td>{{  !empty($product->SubCategoryProduct->name) }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->sku  }}</td>
                                            <td>{{ $product->availability  }}</td>
                                            <td>{{ $product->size  }}</td>
                                            <td>{{ $product->created_at->format('Y-m-d')   }}</td>
                                            <td>
                                                <button class="btn btn-info btn-xs show_modal" id="show" data-toggle="modal" data-target="#showModal"
                                                        data-id="{{ $product->id  }}" data-name="{{ $product->name  }}" data-userid="{{ $product->user_id  }}"
                                                        data-categoryid="{{ $product->category_id }}" data-categoryname="{{ $product->CategoryProduct->name }}"
                                                        data-subcategoryid="{{  !empty($product->sub_category_id )}}" data-subcategoryname="{{  !empty($product->SubCategoryProduct->name) }}"
                                                        data-price="{{ $product->price }}" data-description="{{ $product->description }}" data-images="{{ json_encode($product->images) }}"
                                                        data-sku="{{ $product->sku }}" data-availability="{{ $product->availability }}" data-size="{{ $product->size }}"
                                                        data-colors="{{ json_encode($product->colors) }}" data-created="{{ $product->created_at->format('Y-m-d') }}"
                                                        data-updated="{{ $product->updated_at->format('Y-m-d') }}" data-user="{{ $product->user  }}">
                                                    <i class="fa fa-eye btn-info"></i>
                                                </button>
                                                <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure that you want to delete this item ?')"
                                                   href="{{ url('/admin/del_brand', $product->id)  }}">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('admin.theName')</th>
                                    <th>@lang('admin.category')</th>
                                    <th>@lang('admin.subCategory')</th>
                                    <th>@lang('admin.price')</th>
                                    <th>@lang('admin.sku')</th>
                                    <th>@lang('admin.inStock')</th>
                                    <th>@lang('admin.size')</th>
                                    <th>@lang('admin.created')</th>
                                    <th>@lang('admin.action')</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.content -->
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2019 <a href="shoplist.am">Shoplist.am</a> </strong> All
            rights
            reserved.
        </footer>
        <div class="modal fade" id="showModal" role="dialog">
            <div class="modal-dialog w70">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4>@lang('admin.identificator'): <span id="product_id"> </span> @lang('admin.postBy') : <span id="user_name"> </span></h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.category') </b> <span id="category_name" > </span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.subCategory') </b><span id="subcategory_name" > </span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.theName') </b> <span id="name" > </span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.price') </b> <span id="price" > </span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.sku') </b><span id="sku" > </span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.inStock') </b><span id="availability" > </span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.size') </b><span id="size" > </span></h4>
                        </div>
                        <div class="col-sm-5">
                            <h4 class="colors_get"><b>@lang('admin.colors') </b></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.created') </b><span id="created" > </span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.updated')</b><span id="updated" > </span></h4>
                        </div>
                        <div class="col-sm-12">
                            <h4><b>@lang('admin.description') </b><span id="description_show"> </span></h4>
                        </div>
                        <div class="col-sm-12">
                            <h5><b>@lang('admin.images') </b></h5>
                            <div class="inner-product-details-left">
                                <div class="tab-content">

                                </div>
                                <ul class="col-sm-12 demo_img">

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.close')</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <!-- DataTables -->


    <script>
        $(function () {
            $("#example1").DataTable();

        });
    </script>


@endsection