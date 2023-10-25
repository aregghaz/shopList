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
                        <th>@lang('admin.english')</th>
                        <th>@lang('admin.russian')</th>
                        <th>@lang('admin.armenian')</th>
                        <th>@lang('admin.category')</th>
                        <th>@lang('admin.subCategory')</th>
                        <th>@lang('admin.price')</th>
                        <th>@lang('admin.sku')</th>
                        <th>@lang('admin.inStock')</th>
                        <th>@lang('admin.size')</th>
                        <th>@lang('admin.status')</th>
                        <th>@lang('admin.created')</th>
                        <th class="action-th">@lang('admin.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($products))
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->productName->nameEn }}</td>
                                <td>{{ $product->productName->nameRu }}</td>
                                <td>{{ $product->productName->nameAm }}</td>
                                <td>{{ $product->CategoryProduct->name }}</td>
                                <td> @if(!empty($product->SubCategoryProduct->name)) {{ $product->SubCategoryProduct->name }} @else @endif </td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->sku  }}</td>
                                <td>{{ $product->availability  }}</td>
                                <td>{{ $product->size  }}</td>
                                @if($product->status == '1')
                                    <td>@lang('admin.new')</td>
                                @elseif($product->status == '2')
                                    <td>@lang('admin.hot')</td>

                                @elseif($product->status == '3')
                                    <td>@lang('admin.sale')</td>
                                @elseif($product->status == '4')
                                    <td>@lang('admin.brand')</td>
                                @else
                                    <td></td>
                                @endif
                                <td>{{ $product->created_at->format('Y-m-d')   }}</td>
                                <td>
                                    <button class="btn btn-info btn-xs show_modal" id="edit" data-toggle="modal" data-target="#showModal"
                                            data-id="{{ $product->id  }}"
                                            data-nameen="{{ $product->productName->nameEn  }}"
                                            data-nameru="{{ $product->productName->nameRu  }}"
                                            data-nameam="{{ $product->productName->nameAm  }}"
                                            data-userid="{{ $product->user_id  }}"
                                            data-categoryid="{{ $product->category_id }}"
                                            data-categoryname="{{ $product->CategoryProduct->name }}"
                                            data-subcategoryid="{{ $product->sub_category_id }}"
                                            data-subcategoryname="@if(!empty($product->SubCategoryProduct->name)) {{ $product->SubCategoryProduct->name }} @else @endif "
                                            data-price="{{ $product->price }}"
                                            data-typeid="{{ $product->type_id }}"
                                            data-descriptionam="{{ $product->productName->descriptionAm }}"
                                            data-descriptionru="{{ $product->productName->descriptionRu }}"
                                            data-descriptionen="{{ $product->productName->descriptionEn }}"
                                            data-images="{{ json_encode($product->images) }}"
                                            data-sku="{{ $product->sku }}"
                                            data-availability="{{ $product->availability }}"
                                            data-size="{{ $product->size }}"
                                            data-colors="{{ json_encode($product->colors) }}"
                                            data-created="{{ $product->created_at->format('Y-m-d') }}"
                                            data-updated="{{ $product->updated_at->format('Y-m-d') }}"
                                            data-user="{{ $product->user  }}">
                                        <i class="fa fa-eye btn-info"></i>
                                    </button>
                                    <button class="btn btn-success btn-xs edit_modal" id="edit"
                                            data-toggle="modal" data-target="#editModal">
                                        <i class="fa fa-edit btn-success"></i>
                                    </button>
                                    <a onclick="return confirm('You want delete product ?')"
                                       href="{{ url('/admin/products/del_product', $product->id)  }}">
                                        <i class="fa fa-trash-o btn btn-danger btn-xs"></i>
                                    </a>
                                    <a class="btn btn-warning btn-xs" onclick="return confirm('Do you want add (New) badge on this product')" href="{{ url('/admin/products/brand', $product->id)  }}">
                                        @lang('admin.new')
                                    </a>
                                    <a class="btn btn-primary btn-xs" onclick="return confirm('Do you want add (Hot) badge on this product')" href="{{ url('/admin/products/featured', $product->id)  }}">
                                        @lang('admin.hot')
                                    </a>
                                    <a class="btn btn-danger btn-xs" onclick="return confirm('Do you want add (Sale) badge on this product')" href="{{ url('/admin/products/sale', $product->id)  }}">
                                        @lang('admin.sale')
                                    </a>
                                    <a class="btn btn-primary btn-xs " onclick="return confirm('Do you want add (Brand) badge on this product')" href="{{ url('/admin/products/best', $product->id)  }}">
                                        @lang('admin.best')
                                    </a>
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


    <div class="page-content">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        @if (session('product'))
                            <div class="alert alert-success" role="alert">
                                <h5 class="text-center"> {{ session('product') }}</h5>
                            </div>
                        @endif
                            @if (session('deletePr'))
                                <div class="alert alert-success" role="alert">
                                    <h5 class="text-center"> {{ session('deletePr') }}</h5>
                                </div>
                            @endif
                            @if (session('editproduct'))
                                <div class="alert alert-success" role="alert">
                                    <h5 class="text-center"> {{ session('editproduct') }}</h5>
                                </div>
                            @endif
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2019 <a href="speedshop.am">speedshop.am</a> </strong> All
            rights
            reserved.
        </footer>
        <div class="modal fade" id="showModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4>@lang('admin.identificator'): <span id="product_id"> </span> @lang('admin.postBy') : <span id="user_name"> </span></h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.category')</b> <span id="category_name" > </span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.subCategory')</b><span id="subcategory_name" > </span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.productNameInEnglish')</b> <span id="nameEn" > </span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.productNameInRussian')</b> <span id="nameRu" > </span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.productNameInArmenain')</b> <span id="nameAm" > </span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.price')</b> <span id="price" > </span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.sku')</b><span id="sku" > </span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.inStock')</b><span id="availability" > </span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.size')</b><span id="size" > </span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4 class="colors_get"><b>@lang('admin.colors')</b><span class="insert-color"></span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.created') </b><span id="created" > </span></h4>
                        </div>
                        <div class="col-sm-6">
                            <h4><b>@lang('admin.updated')</b><span id="updated" > </span></h4>
                        </div>
                        <div class="col-sm-12">
                            <h4><b>@lang('admin.description')</b><span id="description_show"> </span></h4>
                        </div>
                        <div class="col-sm-12">
                            <h5><b>@lang('admin.images')</b></h5>
                            <div class="inner-product-details-left">
                                <div class="tab-content">

                                </div>
                                <ul class="demo_img list-inline">

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
        <div class="modal fade" id="editModal" role="dialog">
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4>@lang('admin.identificator'): <span id="product_id_edit"> </span> @lang('admin.postBy') : <span id="user_name_edit"> </span></h4>
                    </div>
                    <div class="modal-body">
                            <form action="{{ url('/admin/products/edit_product') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" id="product_id_edit_hidden">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="category">@lang('admin.productNameInEnglish'):</label>
                                    <input type="text" class="form-control" name="nameEn" id="editeNameEn"
                                           placeholder="Product Name" required/>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="category">@lang('admin.productNameInRussian'):</label>
                                    <input type="text" class="form-control" name="nameRu" id="editeNameRu"
                                           placeholder="Product Name" required/>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="category">@lang('admin.productNameInArmenian'):</label>
                                    <input type="text" class="form-control" name="nameAm" id="editeNameAm"
                                           placeholder="Product Name" required/>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="category_id_edit">@lang('admin.category'):</label>
                                    <select class="form-control" id="category_id_edit" name="category_id_edit">
                                        <option value="0">@lang('admin.selectCategory')</option>
                                        @if(isset($categories))
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="subcategory_name">@lang('admin.subCategory'):</label>
                                    <select class="form-control" id="subcategory_edit" name="sub_category_id">
                                        <option value="0">@lang('admin.selectSubCategory')</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="type_id">Tesak:</label>
                                    <select class="form-control" id="type_id" name="type_id">
                                        <option value="0">Apranq</option>
                                        <option value="1">Carayutyun</option>

                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="icon">@lang('admin.price'):</label>
                                    <input type="text" class="form-control" name="price" placeholder="Price" id="price_edit"
                                           required/>
                                </div>

                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="icon">@lang('admin.sku'):</label>
                                    <input type="text" class="form-control" name="sku" placeholder="Sku" id="sku_edit"
                                           required/>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="icon">@lang('admin.inStock'):</label>
                                    <input type="text" class="form-control" name="availability" id="availability_edit"
                                           placeholder="Availability" required/>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="icon">@lang('admin.size'):</label>
                                    <input type="text" class="form-control" name="size" placeholder="Size" id="size_edit"
                                           required/>
                                </div>
                                <div class="mycolor_edit col-xs-12 ">
                                    <label for="icon" class="pull-left">@lang('admin.colors'): <button onclick="colorFunctionedit()" class="btn btn-success btn-sm color_but">+</button></label>
                                </div>

                                <div class="myimg_edit col-xs-12">
                                        <label for="icon">@lang('admin.images'): <button onclick="fileFunctionedit()" class="btn btn-success btn-sm">+</button></label>
                                    <div id="forImages">

                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-xs-12">
                                    <label for="descriptionEn">@lang('admin.productDescriptionInEnglish'):</label>
                                    <textarea class="form-control" name="descriptionEn"  placeholder="Description"
                                              id="descriptionEn" required></textarea>
                                </div>    <div class="form-group col-sm-12 col-xs-12">
                                    <label for="descriptionRu">@lang('admin.productDescriptionInRussian'):</label>
                                    <textarea class="form-control" name="descriptionRu" placeholder="Description"
                                              id="descriptionRu" required></textarea>
                                </div>    <div class="form-group col-sm-12 col-xs-12">
                                    <label for="descriptionAm">@lang('admin.productDescriptionInArmenian'):</label>
                                    <textarea class="form-control" name="descriptionAm" placeholder="Description"
                                              id="descriptionAm" required></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">@lang('admin.update')</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.close')</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>

    <script>
        $(function () {
            $("#example1").DataTable();

        });
    </script>

@endsection
