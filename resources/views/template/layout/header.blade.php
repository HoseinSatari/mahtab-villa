<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
{!! SEO::generate(true) !!}
<!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{option()->image}}"/>
    <link href="{{option()->image}}" rel="shortcut icon"/>
    <link rel="icon" href="{{option()->image}}" type="image/x-icon">
    <meta name="description" content="Tevily HTML Template For Tour"/>
    
    <!-- fonts -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/animate/animate.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/animate/custom-animate.css"/>
    <link rel="stylesheet" href="/assets/vendors/fontawesome/css/all.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/jarallax/jarallax.css"/>
    <link rel="stylesheet" href="/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css"/>
    <link rel="stylesheet" href="/assets/vendors/nouislider/nouislider.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/nouislider/nouislider.pips.css"/>
    <link rel="stylesheet" href="/assets/vendors/odometer/odometer.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/swiper/swiper.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/tevily-icons/style.css">
    <link rel="stylesheet" href="/assets/vendors/tiny-slider/tiny-slider.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/reey-font/stylesheet.css"/>
    <link rel="stylesheet" href="/assets/vendors/owl-carousel/owl.carousel.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/owl-carousel/owl.theme.default.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/twentytwenty/twentytwenty.css"/>
    <link rel="stylesheet" href="/assets/vendors/bxslider/jquery.bxslider.css"/>
    <link rel="stylesheet" href="/assets/vendors/bootstrap-select/css/bootstrap-select.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/vegas/vegas.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/jquery-ui/jquery-ui.css"/>
    <link rel="stylesheet" href="/assets/vendors/timepicker/timePicker.css"/>
    @toastr_css
    <!-- template styles -->
    <link rel="stylesheet" href="/assets/css/tevily.css"/>
    <link rel="stylesheet" href="/assets/css/tevily-responsive.css"/>
</head>

<body>

<!-- /.preloader -->
<div class="page-wrapper">
    <header class="main-header clearfix">
       @include('template.layout.top-menu')
       @include('template.layout.menu')
    </header>

    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->


    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header__top">
            <div class="page-header-bg" style="background-image: url(@yield('image'))"></div>
            <div class="page-header-bg-overly"></div>
            <div class="container">
                <div class="page-header__top-inner">
                    <h2>@yield('title')</h2>
                </div>
            </div>
        </div>

    </section>


@yield('content')


@include('template.layout.footer')
