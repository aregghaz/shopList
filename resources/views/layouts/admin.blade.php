<!DOCTYPE html>

<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>ShopList</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="/admin/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font/flaticon.css') }}">

    <!-- BEGIN THEME STYLES -->
    <!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
    <link href="/admin/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="/admin/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/admin/layout4/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="/admin/admin/layout4/css/custom.css" rel="stylesheet" type="text/css"/>
    <script src="/admin/global/plugins/jquery.min.js" type="text/javascript"></script>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Styles -->


    <style>
        .container {
            padding-top: 100px;
        }
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
    ]) !!};
    </script>
</head>


<body class="page-header-fixed ">

<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo admin">
            <a href="/admin/dashboard" title="Shoplist.am">
                <img src="/img/logo.png" class="img-responsive" alt="shoplist-logo">
            </a>
            {{--<div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>--}}
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->

        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN HEADER SEARCH BOX -->
            <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
            <form class="search-form" action="extra_search.html" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control input-sm" placeholder="Search..." name="query">
                    <span class="input-group-btn">
					<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
					</span>
                </div>
            </form>
            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">


                    <li class="separator hide">
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{ Config::get('languages')[App::getLocale()] }}
                        </a>
                        <ul class="dropdown-menu lang-ul">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <li class="flag">
                                        <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <i class="icon-envelope-open"></i>
                            <span class="badge badge-danger" {{ count($newOrder) ? "" : 'style=display:none' }}>
						{{ count($newOrder) }} </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                @if(count($newOrder))
                                    <h3>@lang('admin.youHave') <span
                                                class="bold"> {{ count($newOrder) }} @lang('admin.new') </span> @lang('admin.orders')
                                    </h3>
                                    <a href="{{ url('/admin/adminOrders') }}">@lang('admin.all')</a>
                                @else
                                    <h3>you dont have new order</h3>
                                    <a href="{{ url('/admin/adminOrders') }}">@lang('admin.all')</a>
                                @endif

                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;"
                                    data-handle-color="#637283">
                                    @foreach($newOrder as $value)
                                        <li>
                                            <a href="{{ url('/admin/adminOrders') }}">
                                                {{--										<span class="photo">--}}
                                                {{--										<img src="../../assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">--}}
                                                {{--										</span>--}}
                                                <span class="subject">
										            <span class="from">
										                {{ $value->Address->first_name}}
                                                    </span>
										            <span class="time">{{ $value->created_at }} </span>
                                                </span>
                                                <span class="message"
                                                      style="white-space: nowrap;width: 90%;overflow: hidden;text-overflow: ellipsis; ">
										            {{ $value->Address->description }}
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END INBOX DROPDOWN -->

                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
						<span class="username username-hide-on-mobile">
                        {{ Auth::user()->name .' '. Auth::user()->surname }}
                        </span>
                            <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                            <img alt="" class="img-circle" src="/admin/admin/layout4/img/avatar9.jpg"/>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{ route('profile') }}">
                                    <i class="icon-user"></i> @lang('admin.myProfile') </a>
                            </li>
                            {{--<li>
                                <a href="inbox.html">
                                    <i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
								3 </span>
                                </a>
                            </li>--}}
                            <li class="divider">
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}">
                                    <i class="icon-key"></i> @lang('admin.logout') </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
@include('include.admin.menu')
<!-- END SIDEBAR -->
    <div class="page-content-wrapper">
        @yield('content')
    </div>

</div>


<!--[if lt IE 9]>
<script src="/admin/global/plugins/respond.min.js"></script>
<script src="/admin/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="/admin/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/admin/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="/admin/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="/admin/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/admin/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
        type="text/javascript"></script>
<script src="/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/admin/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/admin/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="/admin/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
@if(isset($page))
    @if($page == 'dashboard')


<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="/admin/global/plugins/flot/jquery.flot.js" type="text/javascript"></script>
<script src="/admin/global/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="/admin/global/plugins/flot/jquery.flot.categories.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- DataTables -->
<script type="text/javascript" src="/admin/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"
        src="/admin/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript"
        src="/admin/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript"
        src="/admin/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript"
        src="/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>


<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/admin/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/admin/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="/admin/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script src="/admin/admin/pages/scripts/ecommerce-index.js"></script>
<script src="/admin/admin/pages/scripts/table-advanced.js"></script>


    @elseif($page == 'profile')

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="/admin/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/admin/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="/admin/admin/layout4/scripts/layout.js" type="text/javascript"></script>
        <script src="/admin/admin/layout4/scripts/demo.js" type="text/javascript"></script>
        <script src="/admin/admin/pages/scripts/profile.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->


    @elseif($page == 'newProduct')

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script type="text/javascript" src="/admin/global/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="/admin/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="/admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/admin/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="/admin/admin/layout4/scripts/layout.js" type="text/javascript"></script>
        <script src="/admin/global/scripts/datatable.js"></script>
        <script src="/admin/admin/pages/scripts/ecommerce-products.js"></script>
    @elseif($page == 'notification'
        or $page == 'product'
        or $page == 'orders'
        or $page == 'new'
        or $page == 'hot'
        or $page == 'sale'
        or $page == 'best'
        or $page == 'categories'
        or $page == 'conversation'
        or $page == 'users'
        or $page == 'newCompany'
        )

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script type="text/javascript" src="/admin/global/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="/admin/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="/admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/admin/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="/admin/admin/layout4/scripts/layout.js" type="text/javascript"></script>

        <script src="/admin/global/scripts/datatable.js"></script>


        <script src="/js/script.js" type="text/javascript"></script>

    @endif
@endif
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
     @if(isset($page))
        @if($page == 'dashboard')
        EcommerceIndex.init();
        @elseif($page == 'profile')
        Profile.init(); // init page demo
        @elseif($page == 'newProduct')
        EcommerceProducts.init();
        @endif
    @endif

    });
</script>
</body>
</html>
