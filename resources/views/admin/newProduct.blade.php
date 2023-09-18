@extends("layouts.admin")
@section('content')


    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE HEAD -->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>@lang('admin.addNewProducts')</h1>
            </div>
            <!-- END PAGE TITLE -->

        </div>
        <!-- END PAGE HEAD -->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="index.html">@lang('home.home')</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">@lang('admin.addNewProducts')</a>
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
                                <span class="caption-subject font-green-sharp bold uppercase">@lang('admin.fillFields')</span>
                            </div>
                            <div class="actions btn-set">
                                <button class="btn btn-default btn-circle "><i class="fa fa-reply"></i> @lang('admin.reset')</button>
                                <button class="btn green-haze btn-circle"><i class="fa fa-check"></i> @lang('admin.save')</button>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_general" data-toggle="tab">
                                            @lang('admin.general') </a>
                                    </li>
                                    {{--<li>
                                        <a href="#tab_meta" data-toggle="tab">
                                            @lang('admin.metaTags') </a>
                                    </li>--}}
                                    <li>
                                        <a href="#tab_images" data-toggle="tab">
                                            @lang('admin.images') </a>
                                    </li>
                                    <li>
                                        <a href="#tab_reviews" data-toggle="tab">
                                            @lang('admin.colors')
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content no-space add-product-tab">
                                    <div class="tab-pane active" id="tab_general">
                                        <div class="form-body">
                                            {{-- Apranqi anvanumnery 3 lezvov --}}
                                            <div class="col-sm-4 mt20">
                                                <label class="control-label">
                                                    @lang('admin.productNameInArmenian') <span class="required"> * </span>
                                                </label>
                                                <input type="text" class="form-control" name="nameAm" required>
                                            </div>
                                            <div class="col-sm-4 mt20">
                                                <label class="control-label">
                                                    @lang('admin.productNameInEnglish')
                                                    <span class="required"> * </span>
                                                </label>
                                                <input type="text" class="form-control" name="nameEn" required>
                                            </div>
                                            <div class="col-sm-4 mt20">
                                                <label class="control-label">
                                                    @lang('admin.productNameInRussian')
                                                    <span class="required"> * </span>
                                                </label>
                                                <input type="text" class="form-control" name="nameRu" required>
                                            </div>
                                            {{-- Apranqi nkaragrutyuny 3 lezvov --}}
                                            <div class="col-sm-4 mt20">
                                                <label class="control-label">
                                                    @lang('admin.productDescriptionInArmenian')
                                                    <span class="required"> * </span>
                                                </label>
                                                <textarea class="form-control" name="descriptionAm" required></textarea>
                                            </div>
                                            <div class="col-sm-4 mt20">
                                                <label class="control-label">
                                                    @lang('admin.productDescriptionInEnglish'):
                                                    <span class="required"> * </span>
                                                </label>
                                                <textarea class="form-control" name="descriptionEn" required></textarea>
                                            </div>
                                            <div class="col-sm-4 mt20">
                                                <label class="control-label">
                                                    @lang('admin.productDescriptionInRussian'):
                                                    <span class="required"> * </span>
                                                </label>
                                                <textarea class="form-control" name="descriptionRu" required></textarea>
                                            </div>
                                            <div class="col-sm-6 mt20">
                                                <label class="control-label" for="sel1">@lang('admin.category'):</label>
                                                <select class="table-group-action-input form-control"
                                                        id="sel1" name="category_id" required>
                                                    <option value="">@lang('admin.selectCategory')</option>
                                                    @if(isset($category))
                                                        @foreach($category as $value)
                                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-sm-6 mt20">
                                                <label class="control-label" for="sel2">@lang('admin.subCategory'):</label>
                                                <select class="table-group-action-input form-control"
                                                        id="sel2" name="sub_category_id">
                                                    <option value="0">@lang('admin.selectSubCategory')</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3 mt20">
                                                <label class="control-label">
                                                    @lang('admin.price'):
                                                    <span class="required"> * </span>
                                                </label>
                                                <input type="number" class="form-control" name="price">
                                            </div>
                                            <div class="col-sm-3 mt20">
                                                <label class="control-label">
                                                    @lang('admin.sku'):
                                                    <span class="required"> * </span>
                                                </label>
                                                <input type="number" class="form-control" name="sku">
                                            </div>
                                            <div class="col-sm-3 mt20">
                                                <label class="control-label">
                                                    @lang('admin.inStock'):
                                                    <span class="required"> * </span>
                                                </label>
                                                <input type="number" class="form-control" name="availability">
                                            </div>
                                            <div class="col-sm-3 mt20">
                                                <label class="control-label">
                                                    @lang('admin.size'):
                                                    <span class="required"> * </span>
                                                </label>
                                                <input type="text" class="form-control" name="size">
                                            </div>

                                            <div class="col-sm-6 mt30">
                                                <label class="control-label">
                                                    @lang('admin.status'):
                                                    <span class="required"> * </span>
                                                </label>
                                                <select class="table-group-action-input form-control"
                                                        name="status">
                                                    <option value="">@lang('admin.select')...</option>
                                                    <option value="1">@lang('admin.new')</option>
                                                    <option value="2">@lang('admin.hot')</option>
                                                    <option value="3">@lang('admin.sale')</option>
                                                    <option value="4">@lang('admin.brand')</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    {{--<div class="tab-pane" id="tab_meta">
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
                                            --}}{{--<div class="form-group">
                                                <label class="col-md-2 control-label">Meta Keywords:</label>
                                                <div class="col-md-10">
                                                        <textarea class="form-control maxlength-handler" rows="8"
                                                                  name="product[meta_keywords]"
                                                                  maxlength="1000"></textarea>
                                                    <span class="help-block">
														max 1000 chars </span>
                                                </div>
                                            </div>--}}{{--
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Meta Description:</label>
                                                <div class="col-md-10">
                                                        <textarea class="form-control maxlength-handler" rows="8"
                                                                  name="product[meta_description]"
                                                                  maxlength="255"></textarea>
                                                    <span class="help-block">
														150 - 160 chars </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>--}}
                                    <div class="tab-pane" id="tab_images">
                                        <div class="alert alert-success margin-bottom-10">
                                            <button type="button" class="close" data-dismiss="alert"
                                                    aria-hidden="true"></button>
                                            <i class="fa fa-warning fa-lg"></i> Image type and information need to
                                            be specified.
                                        </div>
                                        <div class="myimg container-fluid">
                                            <div class="row">
                                                <div class="col-sm-4 col-xs-12">
                                                    <input type="file" class="form-control" name="images[]" id="image"
                                                           placeholder="Images" multiple required/>
                                                </div>
                                                <label for="icon">
                                                    <button onclick="fileFunction()" class="btn btn-success btn-sm add-newimg">
                                                        @lang('admin.addImages')
                                                    </button>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_reviews">
                                        <div class="mycolor table-container container-fluid">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <input type="color" class="form-control" name="colors[]" required/>
                                                </div>
                                                <label for="icon">
                                                    <button onclick="colorFunction()" type="button"
                                                            class="btn btn-success btn-sm color_but">@lang('admin.addColors')
                                                    </button>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-title">
                            <div class="actions btn-set">
                                <button class="btn btn-default btn-circle "><i class="fa fa-reply"></i> @lang('admin.reset')</button>
                                <button class="btn green-haze btn-circle"><i class="fa fa-check"></i> @lang('admin.save')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>



@endsection