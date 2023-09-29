@extends("layouts.admin")
@section('content')

        <div class="page-content">

            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE HEAD -->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>Add new product
                        <small>create product</small>
                    </h1>
                </div>
                <!-- END PAGE TITLE -->

            </div>
            <!-- END PAGE HEAD -->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Add new product</a>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">

                <div class="col-md-12">
                    <form class="form-horizontal form-row-seperated" action="{{ url('/admin/products/add_product') }}"
                          method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-basket font-green-sharp"></i>
                                    <span class="caption-subject font-green-sharp bold uppercase">
									Add new product </span>

                                </div>
                                <div class="actions btn-set">
                                    <button type="button" name="back" class="btn btn-default btn-circle"><i
                                                class="fa fa-angle-left"></i> Back
                                    </button>
                                    <button class="btn btn-default btn-circle "><i class="fa fa-reply"></i> Reset
                                    </button>
                                    <button class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
                                    <button class="btn green-haze btn-circle"><i class="fa fa-check-circle"></i> Save &
                                        Continue Edit
                                    </button>
                                    <div class="btn-group">
                                        <a class="btn yellow btn-circle" href="javascript:;" data-toggle="dropdown">
                                            <i class="fa fa-share"></i> More <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="javascript:;">
                                                    Duplicate </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    Delete </a>
                                            </li>
                                            <li class="divider">
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    Print </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_general" data-toggle="tab">
                                                General </a>
                                        </li>
                                        <li>
                                            <a href="#tab_meta" data-toggle="tab">
                                                Meta </a>
                                        </li>
                                        <li>
                                            <a href="#tab_images" data-toggle="tab">
                                                Images </a>
                                        </li>
                                        <li>
                                            <a href="#tab_reviews" data-toggle="tab">
                                                Colors <span class="badge badge-success">
											3 </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab_history" data-toggle="tab">
                                                History </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content no-space">
                                        <div class="tab-pane active" id="tab_general">
                                            <div class="form-body">




                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Product Name in English <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="nameEn"
                                                               placeholder="Product Name in English">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Product Name in Russian <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="nameRu"
                                                               placeholder="Product Name in Russian">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Product Name in Armenian <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="nameAm"
                                                               placeholder="Product Name in Armenian">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Description: <span
                                                                class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control"
                                                                  name="description"></textarea>
                                                    </div>
                                                </div>
                                                {{--<div class="form-group">--}}
                                                {{--<label class="col-md-2 control-label">Short Description: <span--}}
                                                {{--class="required">--}}
                                                {{--* </span>--}}
                                                {{--</label>--}}
                                                {{--<div class="col-md-10">--}}
                                                {{--<textarea class="form-control"--}}
                                                {{--name="product[short_description]"></textarea>--}}
                                                {{--<span class="help-block">--}}
                                                {{--shown in product listing </span>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}

                                                <div class="form-group ">
                                                    <label class="col-md-2 control-label" for="sel1">Category:</label>
                                                    <div class="col-md-10">
                                                        <select class="table-group-action-input form-control input-medium" id="sel1" name="category_id">
                                                            <option value="0">Select Category</option>
                                                            @if(isset($category))
                                                                @foreach($category as $value)
                                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="form-group ">
                                                    <label class="col-md-2 control-label" for="sel2">Sub Category:</label>
                                                    <div class="col-md-10">
                                                        <select class="table-group-action-input form-control input-medium" id="sel2" name="sub_category_id">
                                                            <option value="0">Select sub category</option>


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">SKU: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="sku"
                                                               placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Price: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="price"
                                                               placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Availability: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="availability"
                                                               placeholder="availability">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Size: <span class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="size"
                                                               placeholder="size">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Status: <span
                                                                class="required">
													* </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <select class="table-group-action-input form-control input-medium"
                                                                name="status">
                                                            <option value="">Select...</option>
                                                            <option value="1">Published</option>
                                                            <option value="0">Not Published</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_meta">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Meta Title:</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control maxlength-handler"
                                                               name="product[meta_title]" maxlength="100"
                                                               placeholder="">
                                                        <span class="help-block">
														max 100 chars </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Meta Keywords:</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control maxlength-handler" rows="8"
                                                                  name="product[meta_keywords]"
                                                                  maxlength="1000"></textarea>
                                                        <span class="help-block">
														max 1000 chars </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Meta Description:</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control maxlength-handler" rows="8"
                                                                  name="product[meta_description]"
                                                                  maxlength="255"></textarea>
                                                        <span class="help-block">
														max 255 chars </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_images">
                                            <div class="alert alert-success margin-bottom-10">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true"></button>
                                                <i class="fa fa-warning fa-lg"></i> Image type and information need to
                                                be specified.
                                            </div>
                                            <div class="myimg col-sm-6 col-xs-12">
                                                <div class="form-group col-sm-4 col-xs-12">
                                                    <input type="file" class="form-control" name="images[]" id="image"
                                                           placeholder="Images" required/>
                                                    <label for="icon"><button onclick="fileFunction()" class="btn btn-success btn-xs">Add new</button></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_reviews">
                                            <div class="table-container">
                                                <div class="mycolor col-sm-3 col-xs-12">
                                                    <div class="form-group col-sm-4 col-xs-12 ">
                                                        <label for="icon">Color:
                                                            <button onclick="colorFunction()" type="button" class="btn btn-success btn-xs color_but">+</button>
                                                        </label>
                                                        <input type="color" class="form-control" name="colors[]" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_history">
                                            <div class="table-container">
                                                <table class="table table-striped table-bordered table-hover"
                                                       id="datatable_history">
                                                    <thead>
                                                    <tr role="row" class="heading">
                                                        <th width="25%">
                                                            Datetime
                                                        </th>
                                                        <th width="55%">
                                                            Description
                                                        </th>
                                                        <th width="10%">
                                                            Notification
                                                        </th>
                                                        <th width="10%">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                    <tr role="row" class="filter">
                                                        <td>
                                                            <div class="input-group date datetime-picker margin-bottom-5"
                                                                 data-date-format="dd/mm/yyyy hh:ii">
                                                                <input type="text"
                                                                       class="form-control form-filter input-sm"
                                                                       readonly name="product_history_date_from"
                                                                       placeholder="From">
                                                                <span class="input-group-btn">
															<button class="btn btn-sm default date-set" type="button"><i
                                                                        class="fa fa-calendar"></i></button>
															</span>
                                                            </div>
                                                            <div class="input-group date datetime-picker"
                                                                 data-date-format="dd/mm/yyyy hh:ii">
                                                                <input type="text"
                                                                       class="form-control form-filter input-sm"
                                                                       readonly name="product_history_date_to"
                                                                       placeholder="To">
                                                                <span class="input-group-btn">
															<button class="btn btn-sm default date-set" type="button"><i
                                                                        class="fa fa-calendar"></i></button>
															</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control form-filter input-sm"
                                                                   name="product_history_desc" placeholder="To"/>
                                                        </td>
                                                        <td>
                                                            <select name="product_history_notification"
                                                                    class="form-control form-filter input-sm">
                                                                <option value="">Select...</option>
                                                                <option value="pending">Pending</option>
                                                                <option value="notified">Notified</option>
                                                                <option value="failed">Failed</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="margin-bottom-5">
                                                                <button class="btn btn-sm yellow filter-submit margin-bottom">
                                                                    <i class="fa fa-search"></i> Search
                                                                </button>
                                                            </div>
                                                            <button class="btn btn-sm red filter-cancel"><i
                                                                        class="fa fa-times"></i> Reset
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>

@endsection