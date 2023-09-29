@extends("layouts.admin")
@section('content')

    <div class="page-content">
        <div class="row">
            <div class="col-xs-12">
                @if (session('subcategory'))
                    <div class="alert alert-success" role="alert">
                        <h5 class="text-center"> {{ session('subcategory') }}</h5>
                    </div>
                @endif
                @if (session('edit_category'))
                    <div class="alert alert-success" role="alert">
                        <h5 class="text-center"> {{ session('edit_category') }}</h5>
                    </div>
                @endif
                @if (session('subedir'))
                    <div class="alert alert-success" role="alert">
                        <h5 class="text-center"> {{ session('subedir') }}</h5>
                    </div>
                @endif

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">@lang('admin.categoriesTable')</h3>
                    </div>

                    <div class="box-body">
                        <div class="col-sm-8">
                            @if($relations)
                                @for($i=0 ; $i< count($categories); $i++)

                                    <div class="panel-group">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">

                                                    <a data-toggle="collapse" href="#collapse" class="sub_link" data-id="{{ $categories[$i]->id }}" data-name="{{ $categories[$i]->name }}" data-nameru="{{ $categoriesRu[$i]->name }}" data-nameam="{{ $categoriesAm[$i]->name }}" data-icon="{{ $categories[$i]->icon }}" >
                                                        {!!  $categories[$i]->icon !!}     {{ $categories[$i]->name }}
                                                    </a>
                                                    <div class="pull-right">

                                                        <button class="btn btn-success btn-xs edit_category_admin" id="edit"

                                                                data-toggle="modal" data-target="#editCategory" >
                                                            <i class="fa fa-edit btn-success"></i>
                                                        </button>
                                                        <a  onclick="return confirm('You want delete category ?')" href="{{ url('/admin/del_category', $categories[$i]->id)  }}" ><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a>
                                                    </div>
                                                </h4>

                                            </div>
                                            <div id="collapse" class="panel-collapse collapse">
                                                <ul class="list-group">

                                                    @for($j=0 ;$j< count($categories[$i]->SubCategory) ; $j++ )
                                                        <li class="list-group-item">
                                                            <div class="pull-right">
                                                                <button class="btn btn-success btn-xs subcategory" id="edit"
                                                                        data-toggle="modal" data-target="#SubeditCategory"
                                                                        data-id="{{ $categories[$i]->SubCategory[$j]->id }}"  data-categoryid="{{ $categories[$i]->SubCategory[$j]->category_id }}" data-nameru="{{ $categoriesRu[$i]->SubCategoryRu[$j]->name }}" data-nameam="{{ $categoriesAm[$i]->SubCategoryAm[$j]->name }}" data-name="{{ $categories[$i]->SubCategory[$j]->name }}" >
                                                                    <i class="fa fa-edit btn-success"></i>
                                                                </button>
                                                                <a  onclick="return confirm('You want delete sub-category ?')"
                                                                    href="{{ url('/admin/sub_del_category', $categories[$i]->SubCategory[$j]->id)  }}" >
                                                                    <button class="btn btn-danger btn-xs">
                                                                        <i class="fa fa-trash-o"></i>
                                                                    </button>
                                                                </a>
                                                            </div>
                                                            {{ $categories[$i]->SubCategory[$j]->name }}
                                                            {{ $categoriesRu[$i]->SubCategoryRu[$j]->name }}
                                                            {{ $categoriesAm[$i]->SubCategoryAm[$j]->name }}
                                                        </li>
                                                    @endfor

                                                </ul>
                                                <div class="panel-footer">@lang('admin.addSubCategory')  <b> {{ $categories[$i]->name  }} </b> @lang('admin.category')
                                                    <button class="btn btn-success btn-xs"
                                                            data-toggle="modal" data-target="#addsubcategory" >
                                                        @lang('admin.addSubCategory')
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            @endif



                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                                <button  class="btn btn-success pull-right" data-toggle="collapse"  data-target="#demo">@lang('admin.addCategory')</button>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="demo" class="collapse">
                                        <form action="{{ url('/admin/add_category') }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="category">@lang('admin.categoryNameInEnglish'):</label>
                                                <input type="text" class="form-control" name="nameEn" placeholder="Category name in English" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="title">@lang('admin.categoryNameInRussian') :</label>
                                                <input type="text" class="form-control" id="category_name_for_edit" placeholder="Category name in Russian" name="nameRu" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="title">@lang('admin.categoryNameInArmenian') :</label>
                                                <input type="text" class="form-control" id="category_name_for_edit" placeholder="Category name in Armenian" name="nameAm" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="icon">@lang('admin.categoryIcon'):</label>
                                                <input type="text" class="form-control" name="icon" placeholder="Write icon tag in input" required />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class=" btn btn-success pull-right">@lang('admin.save')</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </div>

    <div class="modal fade" id="editCategory" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 >@lang('admin.categoryId') :<span id="category_id_for_edit_show"></span> </h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/edit_category')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="category_id" id="category_id_for_edit" value="">
                        <div class="form-group col-sm-12">
                            <label for="title">@lang('admin.categoryNameInEnglish') :</label>
                            <input type="text" class="form-control" id="nameEn" placeholder="Category name in English" name="nameEn"  required/>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="title">@lang('admin.categoryNameInRussian') :</label>
                            <input type="text" class="form-control" id="nameRu"  placeholder="Category name in Russian" name="nameRu" required/>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="title">@lang('admin.categoryNameInArmenian') :</label>
                            <input type="text" class="form-control" id="nameAm" placeholder="Category name in Armenian" name="nameAm" required/>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="title">@lang('admin.icon') :</label>
                            <input type="text" class="form-control" id="category_icon_for_edit" placeholder="Category icon" name="icon" required/>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">@lang('admin.save')</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.close')</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
   
    <div class="modal fade" id="SubeditCategory" role="dialog">
            <div class="modal-dialog">
    
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 >@lang('admin.subCategory') @lang('admin.identificator') :<span id="sub_category_id_for_edit_show"></span> </h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/admin/sub_edit_category')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="sub_category_id" id="sub_category_id_for_edit" value="">
                            <input type="hidden" name="category_id" id="category_id_in_sub" value="">
                            <div class="form-group col-sm-12">
                                <label for="title">@lang('admin.subCategoryInEnglish'):</label>
                                <input type="text" class="form-control" id="sub_category_name_for_edit" placeholder="Sub Category name" name="name" />
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="title">@lang('admin.subCategoryInRussian'):</label>
                                <input type="text" class="form-control" id="sub_category_nameRu_for_edit" placeholder="Sub Category name" name="nameRu" />
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="title">@lang('admin.subCategoryInArmenian'):</label>
                                <input type="text" class="form-control" id="sub_category_nameAm_for_edit" placeholder="Sub Category name" name="nameAm" />
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">@lang('admin.save')</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.close')</button>
                            </div>
                        </form>
                    </div>
    
                </div>
            </div>
        </div>
  

    <div class="modal fade" id="addsubcategory" role="dialog">
                <div class="modal-dialog">
        
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 >@lang('admin.addSubCategory') <span id="category_name"></span> @lang('admin.category')</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/admin/subcategory')}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="category_id" id="category_id" value="">
                                <div class="form-group col-sm-12">
                                    <label for="title">@lang('admin.subCategoryInEnglish') :</label>
                                    <input type="text" class="form-control" id="name" placeholder="Sub category name in English" name="nameEn" />
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="title">@lang('admin.subCategoryInRussian') :</label>
                                    <input type="text" class="form-control" id="name" placeholder="Sub category name in Russian" name="nameRu" />
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="title">@lang('admin.subCategoryInArmenian') :</label>
                                    <input type="text" class="form-control" id="name" placeholder="Sub category name in Armenian" name="nameAm" />
                                </div>
        
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">@lang('admin.save')</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.close')</button>
                                </div>
                            </form>
                        </div>
        
                    </div>
                </div>
            </div>


@endsection