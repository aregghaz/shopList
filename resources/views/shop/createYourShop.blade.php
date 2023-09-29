@extends("layouts.main")
@section('title')
    @lang('home.createYourOwnShop') - shoplist.am
@endsection
@section("content")
    {{--<div class="inner-page-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb-area">
                        --}}{{--<h1>@lang('home.createYourOwnShop')</h1>--}}{{--
                        <ul>
                            <li><a class="fal fa-home" href="/"></a> /</li>
                            <li>@lang('home.createYourOwnShop')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <!-- Inner Page Banner Area End Here -->
    <!-- Create your Own shop Page Area Start Here -->
    <div class="container-fluid">
        <div class="row send-request-pagerow">
            <div class="col-md-7">
                <div class="how-to-create-store-wrap">
                   {{-- this is for bg do not remove --}}
                </div>
            </div>
            <div class="col-md-5">
                <div class="create-yourshop-form-wrap">
                    <div class="contact-pageform-container">
                        <h1>@lang('home.sendRequest')</h1>
                        <div class="row">
                            <div class="contact-form">
                                <form id="contact-form" >
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="@lang('account.companyName') *" class="form-control" name="name" id="form-name"  required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="@lang('account.phone') *" class="form-control" name="lastName" id="form-last-name"  required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="email" placeholder="@lang('account.email') *" class="form-control" name="email" id="form-email"  required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" class="btn-send-message">@lang('home.SendRequestToRegister')</button>
                                    </div>
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class='form-response'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection