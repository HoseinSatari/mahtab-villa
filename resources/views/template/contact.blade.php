@extends('template.layout.header')
@section('image' , '/assets/images/backgrounds/page-header-bg.jpg')
@section('title' , 'تماس با ما')
@section('content')

    <section class="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="contact-page__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">با تیم ما صحبت کنید</span>
                            <h2 class="section-title__title">سوالی هست؟ در صورت تمایل با ما تماس بگیرید</h2>
                        </div>
                        <div class="contact-page__social">
                            <a href="{{option()->whatsup}}"><i style="font-family: 'Font Awesome 5 Brands'" class="fa fa-whatsapp" ></i></a>
                            <a href="{{option()->telegram}}"><i style="font-family: 'Font Awesome 5 Brands'"  class="fa fa-telegram"></i></a>
                            <a href="{{option()->instagram}}"><i style="font-family: 'Font Awesome 5 Brands'"  class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="contact-page__right">
                        <div class="comment-form">
                            <form action="{{route('contact')}}" method="post" class="comment-one__form contact-form-validated">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="نام شما" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="شماه شما" name="phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box">
                                            <textarea name="text" placeholder="نوشتن پیام"></textarea>
                                        </div>
                                        <button type="submit" class="thm-btn comment-form__btn">ارسال</button>
                                    </div>
                                </div>
                            </form>
                            <div class="result"></div><!-- /.result -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Page End-->

    <!--Information Start-->
    <section class="information">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <!--Information Single-->
                    <div class="information__single">
                        <div class="information__icon">
                            <span class="icon-place"></span>
                        </div>
                        <div class="information__text">
                            <p>{{option()->address}} </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <!--Information Single-->
                    <div class="information__single">
                        <div class="information__icon">
                            <span class="icon-phone-call"></span>
                        </div>
                        <div class="information__text">
                            <h4>
                                <a href="tel:{{option()->phone}}" class="information__number-1">{{option()->phone}}</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <!--Information Single-->
                    <div class="information__single">
                        <div class="information__icon">
                            <span class="icon-at"></span>
                        </div>
                        <div class="information__text">
                            <h4>
                                <a href="mailto:{{option()->email}}" class="information__mail-2">{{option()->email}}</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Information End-->

    <!--Google Map Start-->
    <section class="contact-page-google-map">
        <iframe src="{{option()->location}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"  class="contact-page-google-map__one" ></iframe>


    </section>

@endsection
