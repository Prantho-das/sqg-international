<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8" />
    <title>SQG international | @yield('title')</title>

    <!-- Mobile Specific Metas
================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Construction Html5 Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />

    <!-- Favicon
================================================== -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
    <link rel="stylesheet" href='{{ asset('plugins/bootstrap/bootstrap.min.css') }}' />
    {{--
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" /> --}}
    <!-- FontAwesome -->
    <link rel="stylesheet" href='{{ asset('plugins/fontawesome/css/all.min.css') }}' />
    <!-- Animation -->
    <link rel="stylesheet" href='{{ asset('plugins/animate-css/animate.css') }}' />
    <!-- slick Carousel -->
    <link rel="stylesheet" href='{{ asset('plugins/slick/slick.css') }}' />
    <link rel="stylesheet" href='{{ asset('plugins/slick/slick-theme.css') }}' />
    <!-- Colorbox -->
    <link rel="stylesheet" href='{{ asset('plugins/colorbox/colorbox.css') }}' />
    <!-- Template styles-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    @stack('style')
</head>

<body>
    <div class="body-inner">
