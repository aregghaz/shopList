@extends("layouts.admin")
@section('content')
<div class="page-content">
    <!-- BEGIN PAGE CONTENT-->
    <div class="col-xs-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="portlet-title box-header">
                    <h3 class="box-title">@lang('admin.conversations') </h3>
                </div>
            </div>

            <div class="portlet-body">
                <div class="page-content-wrapper">
                     <div class="custom-container chat">
                        <div class="row">
                            <div class="col-sm-12" id="app">
                                <div class="panel-heading chatHead"></div>
                                <div class="panel panel-default chatApp">
                                    <chat-messages :user="{{ Auth::user() }}"></chat-messages>
                                </div>
                            </div>
                        </div>
                    </div>  <!-- end chat -->
                    <script src="/js/app.js"></script>
                    <style>
                        .chatApp{
                            margin-bottom: 0;
                            padding: 15px;
                            border-top-left-radius: 0;
                            border-top-right-radius: 0;
                        }

                        .chatApp h6{
                            font-size: 20px;
                        }

                        .chatApp button{
                            margin-top: 15px;
                            padding: 10px;
                            width: 200px;
                            background: #2D8EEA;
                            border-radius: 20px;
                            color: #fff;
                        }
                        .text{
                            padding: 10px;
                            display: inline-block;
                            border-radius: 15px;
                        }
                        .message {
                            display: table;
                            width: 100%;
                            max-width: 80%;
                            margin-top: 10px;
                            margin-bottom: 10px;
                            line-height: 1;
                        }

                        .received .text{
                            background: #f8f8f8;
                            border-top-left-radius: 0;
                        }

                        .sent{
                            margin-right: 15px;
                            float: right;
                            text-align: right;
                        }

                        .sent .text{
                            background: #2D8EEA;
                            color: #fff;
                            border-top-right-radius: 0;
                        }

                        /*.composser{
                            margin-left: -15px;
                            margin-right: -15px;
                        }*/

                        .composser textarea{
                            width: 100%;
                            height: 80px;
                            overflow-y: auto;
                            padding: 15px;
                            margin-top: 15px;
                            resize: none;
                            border: 1px solid #E5E5E5;
                            border-radius: 10px;
                            outline: none;
                        }
                        .conversation .feed{
                            overflow-y: auto;
                            height: 220px;
                        }
                    </style>
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
