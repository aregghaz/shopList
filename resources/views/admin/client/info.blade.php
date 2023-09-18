@extends("layouts.admin")
@section('content')
    <div class="page-content">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content company-content">
                <div class="row">
                    <div class="col-xs-12">
                        <form action="{{ url('/admin/addCompany') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group col-sm-6">
                                <label for="category">@lang('admin.companyName')</label>
                                <input type="text" class="form-control" name="name" value="{{ !empty($company->name) }}" required />
                            </div>
                            @if(!empty($company->logo) and Auth::user()->role !== 'admin')
                            <img src="/img/companies/{{ $company->logo }}" width="100px" height="50px" alt="">
                            @endif
                            <div class="form-group col-sm-6">
                                <label for="title">@lang('admin.companyLogo')</label>
                                <input type="file" name="logo" class="form-control" required/>
                            </div>
                            {{--<div class="form-group col-sm-6">
                                <label for="title">Company main heading text :</label>
                                <input type="text" class="form-control" id="category_name_for_edit" value="{{ !empty($company->text_header) }}" name="text_header" required/>
                            </div>--}}
                            {{--<div class="form-group col-sm-6">
                                <label for="icon">Company heading Text 2:</label>
                                <input type="text" class="form-control" name="text_button" value="{{ !empty($company->text_button) }}" required />
                            </div>--}}
                            <div class="form-group col-sm-6">
                                <label for="icon">@lang('admin.userName')</label>
                                <input type="text" class="form-control" name="firstName" value="{{ !empty($user->name) }}" required />
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="icon">@lang('admin.lastName')</label>
                                <input type="text" class="form-control" name="lastName" value="{{ !empty($user->surname) }}" required />
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="icon">@lang('admin.email'):</label>
                                <input type="text" class="form-control" name="email" value="{{ !empty($user->email) }}" required />
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="icon">@lang('admin.phone'):</label>
                                <input type="text" class="form-control" name="phone" value="{{ !empty($user->phone) }}" required />
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="icon">@lang('admin.userPass'):</label>
                                <input type="password" class="form-control" name="password" required />
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="icon">@lang('admin.reapeatPass'):</label>
                                <input type="password" class="form-control"  name="password_confirmation" required />
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label class="control-label role">@lang('admin.role'): <span class="required">* </span> <i class="fa fa-angle-right"></i> </label>
                                    </div>
                                    <div class="col-xs-6">
                                        <select class="table-group-action-input form-control" name="role" required>
                                            <option value="">@lang('admin.select')...</option>
                                            <option value="admin">@lang('admin.admin')</option>
                                            <option value="client">@lang('admin.client')</option>
                                            <option value="staff">@lang('admin.staff')</option>
                                            <option value="user">@lang('admin.user')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <button type="submit" class="btn btn-success pull-right">@lang('admin.save')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection