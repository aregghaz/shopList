<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="start @if(isset($page))
            @if($page == 'dashboard')
            {{ 'active' }}
            @endif
            @endif">
                <a href="{{ route('adminHome') }}">
                    <i class="fa fa-home"></i>
                    <span class="title">@lang('admin.dashboard')</span>
                </a>
            </li>

            <li class=" @if(isset($page))
            @if($page == 'newProduct' or $page == 'product')
            {{ 'active' }}
            @endif
            @endif">
                <a href="javascript:;">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="title">@lang('admin.products')</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class=" @if(isset($page))
                    @if($page == 'product')
                    {{ 'active' }}
                    @endif
                    @endif">
                        <a href="{{ route('products') }}">
                            <span class="icon-handbag"> </span>
                            @lang('admin.products')
                        </a>
                    </li>
                    <li class=" @if(isset($page))
                    @if($page == 'newProduct')
                    {{ 'active' }}
                    @endif
                    @endif">
                        <a href="{{ url('admin/new-product') }}">
                            <span class="fa fa-plus-square-o"></span>
                            @lang('admin.addNewProducts')</a>
                    </li>
                </ul>
            </li>
            <li class=" @if(isset($page))
            @if($page == 'best' or $page == 'new'or $page == 'hot'or $page == 'sale')
            {{ 'active' }}
            @endif
            @endif">
                <a href="">
                    <i class="fa fa-tag"></i>
                    <span class="title"> @lang('admin.productTag')</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li  @if(isset($page))
                        @if($page == 'new')
                            {{ 'active' }}
                                @endif
                            @endif>
                        <a href="{{ url('admin/brands') }}">
                            <i class="fa fa-circle-o"></i>
                            @lang('admin.new')</a>
                    </li>
                    <li class="@if(isset($page))
                    @if($page == 'hot')
                    {{ 'active' }}
                    @endif
                    @endif">
                        <a href="{{ url('admin/featureds') }}">
                            <i class="fa fa-fire"></i>
                            @lang('admin.hot')</a>
                    </li>
                    <li class="@if(isset($page))
                    @if($page == 'sale')
                    {{ 'active' }}
                    @endif
                    @endif">
                        <a href="{{ url('admin/sales') }}">
                            <i class="fa fa-gift"></i>
                            @lang('admin.sale')</a>
                    </li>
                    <li class=" @if(isset($page))
                    @if($page == 'best')
                    {{ 'active' }}
                    @endif
                    @endif">
                        <a href="{{ url('admin/bests') }}">
                            <i class="fa fa-thumbs-o-up"></i>
                            @lang('admin.best')</a>
                    </li>
                </ul>
            </li>
            <li class="tooltips
            @if(isset($page))
            @if($page == 'orders')
            {{ 'active' }}
            @endif
            @endif
                    " data-container="body" data-placement="right" data-html="true"
                data-original-title="Orders">
                <a href="{{ route('adminOrders') }}">
                    <i class="fa fa-puzzle-piece"></i>
                    <span class="title">
					         @lang('admin.orders')
                        </span>
                </a>
            </li>
            @if(Auth::user()->role == 'admin')
                <li class="tooltips
                @if(isset($page))
                    @if($page == 'categories')
                    {{ 'active' }}
                    @endif
                @endif
                        " data-container="body" data-placement="right" data-html="true"
                    data-original-title="Create a new category">
                    <a href="{{ route('adminCategory') }}">
                        <i class="fa fa-puzzle-piece"></i>
                        <span class="title">
					         @lang('admin.category')
                        </span>
                    </a>
                </li>
                <li class="tooltips
                @if(isset($page))
                @if($page == 'newCompany')
                {{ 'active' }}
                @endif
                @endif" data-container="body" data-placement="right" data-html="true"
                    data-original-title="Create a new company">
                    <a href="{{ route('adminInfo') }}">
                        <i class="fa fa-building"></i>
                        <span class="title">
					         @lang('admin.createNewCompany')
                        </span>
                    </a>
                </li>
                <li class="tooltips  @if(isset($page))
                @if($page == 'users')
                {{ 'active' }}
                @endif
                @endif" data-container="body" data-placement="right" data-html="true"
                    data-original-title="Show all Users">
                    <a href="{{ url('/admin/users') }}">
                        <i class="fa fa-user"></i>
                        <span class="title">
					         @lang('admin.showAllUsers')
                        </span>
                    </a>
                </li>
                <li class="tooltips
  @if(isset($page))
                @if($page == 'notification')
                {{ 'active' }}
                @endif
                @endif
                        " data-container="body" data-placement="right" data-html="true"
                    data-original-title="Notifications">
                    <a href="{{ url('/admin/notification') }}">
                        <i class="fa fa-bell"></i>
                        <span class="title">
					         @lang('admin.notifications')
                        </span>
                    </a>
                </li>
                <li class="tooltips @if(isset($page))
                @if($page == 'conversation')
                {{ 'active' }}
                @endif
                @endif" data-container="body" data-placement="right" data-html="true"
                    data-original-title="Conversations">
                    <a href="{{ url('/admin/conversation') }}">
                        <i class="fa fa-envelope"></i>
                        <span class="title">
					         @lang('admin.conversations')
                        </span>
                    </a>
                </li>
            @endif
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>