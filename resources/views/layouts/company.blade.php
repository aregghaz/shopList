<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font/fontawesome/css/all.min.css') }}">
    <!-- Flaticon CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font/flaticon.css') }}">

    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
    <!-- Modernizr Js -->
    {{--<script src="{{ asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>--}}
</head>

<body>
<div class="wrapper-area">
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Add your site or application content here -->
    <!-- Header Area Start Here -->
@include('include.companyHeader')
<!-- Header Area End Here -->
@yield("content")
<!-- Footer Area Start Here -->
@include('include.footer')
<!-- Footer Area End Here -->
</div>

<!-- Preloader Start Here -->
<div id="preloader"></div>
<!-- Preloader End Here -->
<!-- jquery-->
<script src="{{ asset('js/vendor/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
<!-- Bootstrap js -->
<script src="{{ asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- Owl Cauosel JS -->
<script src="{{ asset('js/owl.carousel.min.js')}}" type="text/javascript"></script>
<!-- Nivo slider js -->
<script src="{{ asset('lib/custom-slider/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
<script src="{{ asset('lib/custom-slider/home.js')}}" type="text/javascript"></script>
<!-- Meanmenu Js -->
<script src="{{ asset('js/jquery.meanmenu.min.js')}}" type="text/javascript"></script>
<!-- WOW JS -->
{{--<script src="{{ asset('js/wow.min.js')}}" type="text/javascript"></script>--}}
<!-- Plugins js -->
<script src="{{ asset('js/plugins.js')}}" type="text/javascript"></script>
<!-- Countdown js -->
<script src="{{ asset('js/jquery.countdown.min.js')}}" type="text/javascript"></script>
<!-- Srollup js -->
<script src="{{ asset('js/jquery.scrollUp.min.js')}}" type="text/javascript"></script>
<!-- Isotope js -->
<script src="{{ asset('js/isotope.pkgd.min.js')}}" type="text/javascript"></script>
<!-- Validator -->
<script src="{{ asset('js/validator.min.js')}}" type="text/javascript"></script>
<!-- Switch-style -->
<script src="{{ asset('js/switch-style.js')}}" type="text/javascript"></script>
<!-- Select 2 -->
<script src="{{ asset('js/select2.min.js')}}" type="text/javascript"></script>
<!-- Custom Js -->
<script src="{{ asset('js/main.js')}}" type="text/javascript"></script>
<!-- Custom create by Henrik -->
<script src="{{ asset('js/script.js')}}" type="text/javascript"></script>

</body>

</html>
