@extends("layouts.main")
@section('title')
    @lang('home.contact') - shoplist.am
@endsection
@section("content")
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumb-area">
                            <ul>
                                <li><a class="fal fa-home" href="/"></a> /</li>
                                <li>@lang('home.contact')</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- Contact Us Page Area Start Here -->
        <div class="contact-us-page-area contact-us-left">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8 col-xs-12">
                        <div class="contact-us-left">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="google-map-area">
                                        <div id="googleMap" style="width:100%; height:395px;">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3048.814683725176!2d44.518070614753725!3d40.16867957861306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abc60037ed283%3A0x11f22301dceb98a6!2z1ZTVodW71aHVptW21bjWgtW21bjWgiDWg9W41bLVuNaBLCDUtdaA1ofVodW2LCDVgNWh1bXVodW91b_VodW2!5e0!3m2!1shy!2s!4v1559984691144!5m2!1shy!2s" width="100%" height="395" frameborder="0" style="border:0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="contact-us-right">
                            <h1 class="title-sidebar">@lang('home.info')</h1>
                            <ul>
                                <li><i class="fal fa-map-marker"></i> Qajaznuni st. 11 bld. 35 apt. </li>
                                <li><i class="fal fa-envelope"></i> info@shoplist.am</li>
                                <li><i class="fal fa-mobile-android"></i> + 374 94 80 60 80</li>
                                <li><i class="fal fa-mobile-android"></i> + 374 77 43 13 75</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container contact-pageform-container">
                <div class="row">
                    <div class="col-md-9">
                        <h2>@lang('home.sendUs')</h2>
                        <div class="row">
                            <div class="contact-form">
                                <form id="contact-form" >
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="@lang('account.firstName') *" class="form-control" name="name" id="form-name"  required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="@lang('account.lastName') *" class="form-control" name="lastName" id="form-last-name"  required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="email" placeholder="@lang('account.email') *" class="form-control" name="email" id="form-email"  required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="@lang('account.phone') *" class="form-control" name="phone" id="form-phone"  required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea placeholder="@lang('account.message') *" class="textarea form-control" name="message" id="form-message" rows="8" cols="20"  required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn-send-message">@lang('home.send')</button>
                                        </div>
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
        <!-- Contact Us Page Area End Here -->

            <!-- Google map -->
    {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgREM8KO8hjfbOC0R_btBhQsEQsnpzFGQ"></script>--}}
@endsection