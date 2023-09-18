@extends("layouts.main")
@section("content")
    <!-- Inner Page Banner Area Start Here -->
    <div class="inner-page-banner-area">
        <div class="custom-container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb-area">
                        <ul>
                            <li><i class="fal fa-home"></i><a href="/">@lang('home.home')</a> &#8250;</li>
                            <li><a href="#">@lang('home.terms')</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt80">
        <div class="row">
            <div class="col-xs-12">
                <div class="terms-and-conditions">
                    @lang('terms.trTerms')
                </div>
            </div>
        </div>
    </div>
@endsection