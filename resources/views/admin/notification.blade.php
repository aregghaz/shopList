@extends("layouts.admin")
@section('content')
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->
        <div class="col-xs-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="portlet-title box-header">
                        <h3 class="box-title">@lang('admin.notifications') </h3>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="page-content-wrapper">
                        <div id="app" class="pb70">
                            <!-- home Vue component -->
                            <home></home>
                        </div>
                        <!-- Scripts -->
                        <script src="/js/app.js"></script>
                    </div>

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
            <strong>Copyright &copy; 2019 <a href="shoplist.am">Shoplist.am</a> </strong> All
            rights
            reserved.
        </footer>

        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>

@endsection
