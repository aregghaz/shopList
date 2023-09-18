<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@lang('home.metaDesc')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        @if(isset($noIndex))
        <meta name="robots" content="noindex, nofollow" >
        <meta name="googlebot" content="noindex, nofollow">
        @endif
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <!-- Main CSS -->
    {{--<link rel="stylesheet" href="{{ asset('css/main.css') }}">--}}
    <!-- Main CSS -->
    {{--<link rel="stylesheet" href="{{ asset('css/mycss.css') }}">--}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Animate CSS -->
    {{--<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">--}}
    <!-- Font-awesome CSS-->
    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="{{ asset('css/font/fontawesome/css/all.min.css') }}">
    <!-- Flaticon CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font/flaticon.css') }}">
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- Main Menu CSS -->
    {{--<link rel="stylesheet" href="{{ asset('css/meanmenu.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
    <!-- Modernizr Js -->
    {{--<script src="{{ asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>--}}
    {{--<script src="{{ asset('js/vendor/jquery-2.2.4.min.js')}}" type="text/javascript"></script>--}}
    <!-- jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
    'user' => Auth::user(),
    'pusherKey' => config('broadcasting.connections.pusher.key'),
  ]) !!};
    </script>
</head>

<body>
<!-- Preloader Start Here -->
<div id="preloader"></div>
<!-- Preloader End Here -->
@include('include.convers')
    <div class="wrapper-area">
         <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Add your site or application content here -->
        <!-- Header Area Start Here -->
     @include('include.header')
        <!-- Header Area End Here -->
        @yield("content")

    <!-- Footer Area Start Here -->
    @include('include.footer')
        <!-- Footer Area End Here -->
    </div>
<script>
    $('#searchCategory').on('click', function (event) {
        $('#categoryId').val($(event.target).attr('data-id'))

    })
</script>
    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
    <!-- Bootstrap js -->
    <!-- Owl Cauosel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="/admin/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Meanmenu Js -->
    <script src="{{ asset('js/jquery.meanmenu.min.js')}}" type="text/javascript"></script>

    <!-- Countdown js -->
    <script src="{{ asset('js/jquery.countdown.min.js')}}" type="text/javascript"></script>
    <!-- Srollup js -->
    <script src="{{ asset('js/jquery.scrollUp.min.js')}}" type="text/javascript"></script>
    <!-- Isotope js -->
    <script src="{{ asset('js/isotope.pkgd.min.js')}}" type="text/javascript"></script>
    <!-- Validator -->
    <script src="{{ asset('js/validator.min.js')}}" type="text/javascript"></script>

    {{--<!-- Select 2 -->
    <script src="{{ asset('js/select2.min.js')}}" type="text/javascript"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>
    <!-- Custom Js -->
    <script src="{{ asset('js/main.js')}}" type="text/javascript"></script>
    <!-- Custom create by Henrik -->
    <script src="{{ asset('js/script.js')}}" type="text/javascript"></script>
</body>

</html>
