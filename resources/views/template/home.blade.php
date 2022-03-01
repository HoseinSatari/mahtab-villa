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
    <meta name=”keywords” content=”{{option()->keyword}}”>

    <meta name="description" content="Tevily HTML Template For Tour"/>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        /* .container{
            width:90%
            margin:10px auto;
        } */
        .portfolio-menu {
            text-align: center;
        }

        .portfolio-menu ul li {
            display: inline-block;
            margin: 0;
            list-style: none;
            padding: 10px 15px;
            cursor: pointer;
            -webkit-transition: all 05s ease;
            -moz-transition: all 05s ease;
            -ms-transition: all 05s ease;
            -o-transition: all 05s ease;
            transition: all .5s ease;
        }

        .portfolio-item {
            /*width:100%;*/
        }

        .portfolio-item .item {
            /*width:303px;*/
            float: left;
            margin-bottom: 10px;
        }

    </style>
    <!-- fonts -->

    <link rel="stylesheet" href="/date/persian-datepicker.min.css"/>
    <script src="/date/jquery-1.12.0.min.js"></script>
    <script src="/date/persian-date.min.js"></script>
    <script src="/date/persian-datepicker.min.js"></script>
    <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.min.css"/>
    <!--<link rel="stylesheet" href="/assets/vendors/animate/animate.min.css"/>-->
    <!--<link rel="stylesheet" href="/assets/vendors/animate/custom-animate.css"/>-->
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

    <!-- template styles -->
    <link rel="stylesheet" href="/assets/css/tevily.css"/>
    <link rel="stylesheet" href="/assets/css/tevily-responsive.css"/>
    @toastr_css
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

    <!--Main Slider Start-->
    <section class="main-slider">
        <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
    "effect": "fade",
    "pagination": {
        "el": "#main-slider-pagination",
        "type": "bullets",
        "clickable": true
      },
    "navigation": {
        "nextEl": ".main-slider-button-next",
        "prevEl": ".main-slider-button-prev",
        "clickable": true
    },
    "autoplay": {
        "delay": 5000
    }}'>

            @if(\App\Slider::where('is_active' , '1')->count())
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                            <div class="image-layer"
                                 style="background-image: url(/images/photos/shares/gallery/PicsArt_07-31-10.23.51.jpg);"></div>
                            <div class="image-layer-overlay"></div>
                            <div class="container">
                                <div class="swiper-slide-inner">
                                    <div class="row">
                                        <div class="col-xl-12">
                                              <a href="https://app.mahtab-villa.ir/"> <button class="btn btn-outline-light" style="height:4rem">ورود به نسخه موبایلی مهتاب</button></a>  
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @foreach(\App\Slider::where('is_active' , '1')->orderBy('order' , 'asc')->get() as $slider)
                        <div class="swiper-slide">
                            <div class="image-layer"
                                 style="background-image: url({{$slider->image}});"></div>
                            <div class="image-layer-overlay"></div>
                            <div class="container">
                                <div class="swiper-slide-inner">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            @if($slider->text)
                                                <h2> {{$slider->text}}</h2>
                                            @endif
                                            @if($slider->text2)
                                                <p>{{$slider->text2}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="main-slider-nav">

                    <div class="main-slider-button-next"><span class="icon-right-arrow"></span></div>
                    <div class="main-slider-button-prev"><span class="icon-right-arrow"></span></div>
                </div>

        </div>
    </section>

    <!--Tour Search Start-->
    <section class="tour-search">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tour-search-box">
                        <form class="tour-search-one" action="{{route('order.check')}}" method="post">
                            @csrf
                            <div class="tour-search-one__inner">
                                <div class="tour-search-one__inputs">
                                    <div class="tour-search-one__input-box">
                                        <label for="place">شروع</label>
                                        <input type="text" class="example1" placeholder="1400/04/04" name="start"
                                               id="date" required>
                                    </div>
                                    <div class="tour-search-one__input-box">
                                        <label>روز پایان </label>
                                        <input type="text" class="example1" placeholder="1400/04/06" name="end" id="end"
                                               required>
                                    </div>

                                    <div class="tour-search-one__input-box tour-search-one__input-box-last">
                                        <label for="type">تعداد</label>
                                        <select class="selectpicker" name="qty" id="type" required>
                                            @for($i=1;$i<=vv()->qty;$i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="tour-search-one__btn-wrap">
                                    <button type="submit" class="thm-btn tour-search-one__btn">رزرو خانه مهتاب</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

<!--Tour Search End-->
    <script type="text/javascript">

        dd = '<?php echo json_encode($days); ?>'
        $(document).ready(function () {
            {!! \File::get(public_path('/date/jquery-1.12.0.min.js')) !!}
            {!! \File::get(public_path('/date/persian-date.min.js')) !!}
            {!! \File::get(public_path('/date/persian-datepicker.min.js')) !!}
            $(".example1").persianDatepicker({
                format: "YYYY-MM-DD",
                minDate: new persianDate().unix(),
                checkDate: function(unix ){
                    return  !dd.includes(new persianDate(unix).format('YYYY-MM-DD'));
                }


            });
        });
    </script>

    <section class="popular-tours" style="margin-top: 35px">
        <div class="popular-tours__container">
            <div class="section-title text-center">

                <h2 class="section-title__title"> درباره خانه مهتاب </h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    {!! vv()->descrip !!}
                </div>
            </div>
            <div class="row mt-5">

                <div class="col-lg-6" style="margin-right: auto;margin-left: auto">
                    @foreach(vv()->attributes as $attr)
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th class="col-3 ">{{$attr->name}} :</th>
                                <td class="col-3"> {{\App\Attribute_value::find($attr->pivot->value_id)->value}}</td>
                            </tr>
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{--    gallery villa--}}
    <section class="popular-tours">
        <div class="popular-tours__container">
            <div class="section-title text-center">

                <h2 class="section-title__title"> گالری ویلا</h2>
            </div>

            <div class="container">
                <div class="portfolio-item row">
                    @foreach(vv()->Gallery()->get() as $image)
                        <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
                            <a href="{{$image->image}}" class="fancylight popup-btn" data-fancybox-group="light">
                                <img class="img-fluid" src="{{$image->image}}" alt="{{$image->alt}}" style="height:12.6rem">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


        <div class="row" style="width:80% ; margin: 0 auto ;mb-3">
            <div class="col-xl-12" style="margin-left: auto;margin-right: auto">
                <video width="100%" height="500px" controls="controls" style="margin-left: auto;margin-right: auto">
                    <source src="/images/files/shares/Mahtab.mp4" type="video/mp4"/>
                </video>
            </div>
        </div>
    
        <div class="row" style="width:80% ; margin: 0 auto">
            <div class="col-xl-12" style="margin-left: auto;margin-right: auto">
                <video width="100%" height="500px" controls="controls" style="margin-left: auto;margin-right: auto">
                    <source src="{{vv()->video}}" type="video/mp4"/>
                </video>
            </div>
        </div>
   

    <script>
        function gg() {
            if ($("#com").children().length == 0) {
                $("#com").append("<form action=\"/comment\" method=\"post\">\n" +
                    "        <input type=\"hidden\" name=\"commentable_type\" value=\"App\\Vila\">\n" +
                    "        <input type=\"hidden\" name=\"commentable_id\" value=\"1\">\n" +
                    "        <div class=\"form-group\" style=\"margin-bottom: 10px\">\n" +
                    "            <input type=\"text\" name=\"name\" placeholder=\"نام شما\" class=\"form-control\" required style=\"margin-bottom: 10px\">\n" +
                    "            <input type=\"text\" name=\"phone\" placeholder=\"شماه شما\" class=\"form-control\" required style=\"margin-bottom: 10px\">\n" +
                    "        </div>\n" +
                    "        <div class=\"form-group\">\n" +
                    "            <textarea name=\"comment\" class=\"form-control\" placeholder=\"نظر شما\" id=\"\" cols=\"30\" rows=\"3\" required style=\"margin-bottom: 10px\"></textarea>\n" +
                    "        </div>\n" +
                    "        <button class=\"btn btn-success\" style=\"width: 100%\">ثبت نظر</button>\n" +
                    "    </form>");
            } else {
                $("#com").empty();
            }
        }

    </script>

    <!--Testimonial One Start-->

    <section class="testimonial-one">
        <p style="text-align: center">
            <button class="btn btn-outline-danger" onclick="gg()" style="z-index: 1000">ثبت نظر</button>

        </p>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-sm-12" id="com"></div>
            </div>
        </div>
        <div class="testimonial-one-shape-2 float-bob-y">
            <img src="/assets/images/shapes/testimonial-one-shape-2.png" alt="">
        </div>
        <div class="testimonial-one-shape-3 wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
            <img src="/assets/images/shapes/testimonial-one-shape-3.png" alt="">
        </div>
        <div class="container">
            <div class="section-title text-center">
                <h2 class="section-title__title">نظرات شما</h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="testimonial-one__carousel owl-theme owl-carousel">
                        @foreach(vv()->comments()->where('approved','1')->get() as $comment)
                            <div class="testimonial-one__single">
                                <div class="testimonail-one__content">
                                    <p class="testimonial-one__text">{{$comment->comment}}</p>
                                    <div class="testimonial-one__client-info">
                                        <h3 class="testimonial-one__client-name">{{$comment->name}} </h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Testimonial One End-->


    <!--Why Choose Start-->
    <section class="why-choose">
        <div class="why-choose__container">
            <div class="why-choose__left">
                <div class="why-choose__left-bg"
                     style="background-image: url(assets/images/backgrounds/why-choose-left-bg.jpg)"></div>
                <div class="why-choose__toggle">
                    <p>مهتاب<br> خانه </p>
                </div>
            </div>
            <div class="why-choose__right">
                <div class="why-choose__right-map"
                     style="background-image: url(assets/images/shapes/why-choose-right-map.png)"></div>
                <div class="why-choose__right-content">
                    <div class="section-title text-left">
                        <h2 class="section-title__title">چرا ما را انتخاب کنید</h2>
                    </div>
                    <p class="why-choose__right-text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                        استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                        است</p>
                    <ul class="list-unstyled why-choose__list">
                        <li>
                            <div class="icon">
                                <span class="icon-travel"></span>
                            </div>
                            <div class="text">
                                <h4>حرفه ای و دارای گواهینامه</h4>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="icon-travel-map"></span>
                            </div>
                            <div class="text">
                                <h4>رزرو تورهای فوری را دریافت کنید</h4>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Why Choose End-->

    {{--   category by photo--}}
    @if(\App\Category::count() >= 5)
        <section class="destinations-one">
            <div class="container">
                <div class="section-title text-center">
                    <h2 class="section-title__title">بر اساس دسته بندی</h2>
                </div>
                <div class="row masonary-layout">
                    @php $cat1 = \App\Category::where('view_order' , '1')->first()  @endphp
                    <div class="col-xl-3 col-lg-3">
                        <div class="destinations-one__single">
                            <div class="destinations-one__img">
                                <img src="{{$cat1->image}}" alt="{{$cat1->name}}" style="height: 285px">
                                <div class="destinations-one__content">
                                    <h2 class="destinations-one__title"><a
                                            href="{{route('articles' , ['c' => $cat1->slug])}}">{{$cat1->name}}</a>
                                    </h2>
                                </div>
                                <div class="destinations-one__button">
                                    <a href="#">{{$cat1->articles()->count()}} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        @php $cat2 = \App\Category::where('view_order' , '2')->first()  @endphp
                        <div class="destinations-one__single">
                            <div class="destinations-one__img">
                                <img src="{{$cat2->image}}" alt="{{$cat2->name}}" style="height: 285px">
                                <div class="destinations-one__content">
                                    <h2 class="destinations-one__title"><a
                                            href="{{route('articles' , ['c' => $cat2->slug])}}">{{$cat2->name}}</a>
                                    </h2>
                                </div>
                                <div class="destinations-one__button">
                                    <a href="#">{{$cat2->articles()->count()}} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        @php $cat2 = \App\Category::where('view_order' , '3')->first()  @endphp
                        <div class="destinations-one__single">
                            <div class="destinations-one__img">
                                <img src="{{$cat2->image}}" alt="{{$cat2->name}}" style="height: 285px">
                                <div class="destinations-one__content">
                                    <h2 class="destinations-one__title"><a
                                            href="{{route('articles' , ['c' => $cat2->slug])}}">{{$cat2->name}}</a>
                                    </h2>
                                </div>
                                <div class="destinations-one__button">
                                    <a href="#">{{$cat2->articles()->count()}} </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        @php $cat2 = \App\Category::where('view_order' , '4')->first()  @endphp
                        <div class="destinations-one__single">
                            <div class="destinations-one__img">
                                <img src="{{$cat2->image}}" alt="{{$cat2->name}}" style="height: 285px">
                                <div class="destinations-one__content">
                                    <h2 class="destinations-one__title"><a
                                            href="{{route('articles' , ['c' => $cat2->slug])}}">{{$cat2->name}}</a></h2>
                                </div>
                                <div class="destinations-one__button">
                                    <a href="#">{{$cat2->articles()->count()}} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        @php $cat2 = \App\Category::where('view_order' , '5')->first()  @endphp
                        <div class="destinations-one__single">
                            <div class="destinations-one__img">
                                <img src="{{$cat2->image}}" alt="{{$cat2->name}}" style="height: 285px">
                                <div class="destinations-one__content">
                                    <p class="destinations-one__sub-title">حیات وحش</p>
                                    <h2 class="destinations-one__title"><a
                                            href="{{route('articles' , ['c' => $cat2->slug])}}">{{$cat2->name}}</a></h2>
                                </div>
                                <div class="destinations-one__button">
                                    <a href="#"> {{$cat2->articles()->count()}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif
<!--News One Start-->
    @if(\App\Article::count() >= 3)
        <section class="news-one">
            <div class="container">
                <div class="news-one__top">
                    <div class="row">
                        <div class="col-xl-9 col-lg-9">
                            <div class="news-one__top-left">
                                <div class="section-title text-left">
                                    <h2 class="section-title__title">اخرین پست ها </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3">
                            <div class="news-one__top-right">
                                <a href="{{route('articles')}}" class="news-one__btn thm-btn">دیدن همه </a></div>
                        </div>
                    </div>
                </div>
                <div class="news-one__bottom">
                    <div class="row">
                        @foreach(\App\Article::where('is_active' , '1')->latest()->get()->take(3) as $article)
                            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">

                                <div class="news-one__single">
                                    <div class="news-one__img">
                                        <img src="{{$article->image}}" alt="{{$article->title}}" style="height: 400px">
                                        <a href="{{route('single.article' , ['slug' => $article->slug])}}">
                                            <span class="news-one__plus"></span>
                                        </a>
                                        <div class="news-one__date">
                                            <p>{{jdate($article->created_at)->format('%d')}} <br>
                                                <span>{{jdate($article->created_at)->format('%B')}}</span></p>
                                        </div>
                                    </div>
                                    <div class="news-one__content">
                                        <ul class="list-unstyled news-one__meta">
                                            <li><a href="" onclick="event.preventDefault()"><i
                                                        class="far fa-user-circle"></i>{{$article->user->name}}</a></li>
                                            <li><a href="" onclick="event.preventDefault()"><i
                                                        class="far fa-comments"></i>{{$article->comments()->count()}}
                                                    نظر</a>
                                            </li>
                                        </ul>
                                        <h3 class="news-one__title">
                                            <a href="{{route('single.article' , ['slug' => $article->slug])}}">{{$article->title}}</a>
                                        </h3>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
@endif
<!--News One End-->
    <script>
        // $('.portfolio-item').isotope({
        //  	itemSelector: '.item',
        //  	layoutMode: 'fitRows'
        //  });


        $('.portfolio-menu ul li').click(function () {
            $('.portfolio-menu ul li').removeClass('active');
            $(this).addClass('active');

            var selector = $(this).attr('data-filter');
            $('.portfolio-item').isotope({
                filter: selector
            });
            return false;
        });

        $(document).ready(function () {
            {!! \File::get(public_path('/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js')) !!}
            var popup_btn = $('.popup-btn');
            popup_btn.magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>
    <!--Site Footer One Start-->
@include('template.layout.footer')
