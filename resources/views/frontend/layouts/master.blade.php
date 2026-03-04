<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0; maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <title>@yield('title')</title>

    <!-- CSS -->
    <link href="{{ asset('frontend/css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/magnific-popup/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/iconmoon/css/iconmoon.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/owl-carousel/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

</head>

<body>

    @include('frontend.layouts.haeder')

    @yield('content')

    @include('frontend.layouts.footer')

</body>

</html>