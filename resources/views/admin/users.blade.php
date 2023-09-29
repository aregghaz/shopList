@extends("layouts.admin")
@section('content')

    <div class="page-content">

        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE HEAD -->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>@lang('admin.allUsersTable')
                    <small>@lang('admin.table')</small>
                </h1>
            </div>
            <!-- END PAGE TITLE -->

        </div>
        <!-- END PAGE HEAD -->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{ route('adminHome') }}">@lang('admin.dashboard')</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">@lang('admin.allUsers')</a>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- END PAGE HEADER-->

                <div class="row">
                <div class="col-xs-12">
              @if (session('notification'))
               <div class="alert alert-success" role="alert">
                  <h5 class="text-center"> {{ session('notification') }}</h5>
              </div>
            @endif 
           
          <div class="box">

            <?php $i = 1; ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>@lang('admin.name')</th>
                  <th>@lang('admin.surName')</th>
                  <th>@lang('admin.email')</th>
                  <th>@lang('admin.phone')</th>
                  <th>@lang('admin.country')</th>
                  <th>@lang('admin.city')</th>
                  <th>@lang('admin.state')</th>
                  <th>@lang('admin.address')</th>
                  <th>@lang('admin.postCode')</th>
                  <th>@lang('admin.role')</th>
                  <th>@lang('admin.created')</th>
                  <th>@lang('admin.action')</th>
                </tr>
                </thead>
                <tbody>
                
                  @if(isset($users))
                    @foreach($users as $user)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->country }}</td>
                        <td>{{ $user->city }}</td>
                        <td>{{ $user->state }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->post_code }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at->format('Y-m-d')  }}</td>
                        <td>
                          <button class="btn btn-success btn-xs" id="edit" 
                            data-name="{{ $user->name }}" data-surname="{{ $user->surname }}" data-email="{{ $user->email }}"
                            data-phone="{{ $user->phone }}" data-country="{{ $user->country }}" data-city="{{ $user->city }}"
                            data-state="{{ $user->state }}" data-address="{{ $user->address }}" data-role="{{ $user->role }}"
                            data-id="{{ $user->id }}" data-password="{{ $user->password }}" data-post="{{ $user->post_code }}"
                            data-toggle="modal" data-target="#editModal" >
                            <i class="fa fa-edit btn-success"></i>
                          </button>
                          <a onclick="return confirm('You want delete user ?')" href="{{ url('/admin/deluser', $user->id)  }}" ><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>@lang('admin.name')</th>
                    <th>@lang('admin.surName')</th>
                    <th>@lang('admin.email')</th>
                    <th>@lang('admin.phone')</th>
                    <th>@lang('admin.country')</th>
                    <th>@lang('admin.city')</th>
                    <th>@lang('admin.state')</th>
                    <th>@lang('admin.address')</th>
                    <th>@lang('admin.postCode')</th>
                    <th>@lang('admin.role')</th>
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

    <!-- /.content -->
  </div>

  <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">

          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 >@lang('admin.identificator'): <span id="user_id_show"></span></h4>
              </div>
              <div class="modal-body">
                  <form action="{{ url('/admin/admin_edit_user')}}" method="post">
                      <input class="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="user_id" id="user_id" value="">
                      <div class="form-group col-sm-6">
                          <label for="title">@lang('admin.name'):</label>
                          <input type="text" class="form-control" id="name" name="name" />
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="description">@lang('admin.surName'):</label>
                          <input type="text" class="form-control" id="surname" name="surname" />
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="description">@lang('admin.email'):</label>
                          <input type="email" class="form-control" id="email" name="email" />
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="description">@lang('admin.userPass'):</label>
                        <input type="text" class="form-control" id="password" name="password" />
                    </div>
                      <div class="form-group col-sm-6">
                          <label for="description">@lang('admin.phone'):</label>
                          <input type="text" class="form-control" id="phone" name="phone" />
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="description">@lang('admin.country'):</label>
                          <input type="text" class="form-control" id="country"  name="country" />
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="description">@lang('admin.city'):</label>
                          <input type="text" class="form-control" id="city" name="city" />
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="description">@lang('admin.state'):</label>
                          <input type="text" class="form-control" id="state" name="state" />
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="description">@lang('admin.address'):</label>
                          <input type="text" class="form-control" id="address" name="address" />
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="description">@lang('admin.postCode'):</label>
                        <input type="text" class="form-control" id="post_code" name="post_code" />
                    </div>
                      <div class="form-group col-sm-12">
                          <label for="description">@lang('admin.role'):</label>
                          <select  class="form-control" name="role" id="role" >
                            <option value="admin">@lang('admin.admin')</option>
                            <option value="user">@lang('admin.user')</option>
                            <option value="client">@lang('admin.client')</option>
                            <option value="staff">@lang('admin.staff')</option>
                          </select>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-success">@lang('admin.saveChanges')</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.close')</button>
                      </div>
                  </form>
              </div>

          </div>
      </div>
  </div>



    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();

  });

  $('#edit').click(function() {
    var id = $(this).data('id');
    var name = $(this).data('name');
    var surname = $(this).data('surname');
    var email = $(this).data('email');
    var password = $(this).data('password');
    var phone = $(this).data('phone');
    var country = $(this).data('country');
    var city = $(this).data('city');
    var state = $(this).data('state');
    var address = $(this).data('address');
    var post_code = $(this).data('post');
    var role = $(this).data('role');

    $('#user_id_show').text(id);
    $('#user_id').val(id);
    $('#name').val(name);
    $('#surname').val(surname);
    $('#email').val(email);
    $('#password').val(password);
    $('#phone').val(phone);
    $('#country').val(country);
    $('#city').val(city);
    $('#state').val(state);
    $('#address').val(address);
    $('#post_code').val(post_code);
    $('#role').val(role);
    
  });
</script>



@endsection
