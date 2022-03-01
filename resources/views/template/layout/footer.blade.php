<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__content">
        <form action="{{route('articles' )}}">
            <label for="search" class="sr-only">جستجو کنید</label><!-- /.sr-only -->
            <input type="text" id="search" name="q" placeholder="جستجو کنید..." />
            <button type="submit" aria-label="search submit" class="thm-btn">
                <i class="icon-magnifying-glass"></i>
            </button>
        </form>
    </div>
    <!-- /.search-popup__content -->
</div>
<footer class="site-footer">
    <div class="site-footer__top">
        <div class="container">
            <div class="site-footer__top-inner">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="footer-widget__column footer-widget__about">
                            <div class="footer-widget__about-logo">
                                <a href="{{route('home')}}"><img src="{{option()->image}}"
                                                          alt="{{option()->sitename}}" style="width: 100px;height: 70px;transform: scale(2)"></a>
                            </div>
                            <p class="footer-widget__about-text">محیطی ارام و دلنشین با بهترین امکانات رفاهی در دل طبیعتی بسیار زیبا</p>
                            <ul class="footer-widget__about-contact list-unstyled">
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-phone-square-alt"></i>
                                    </div>
                                    <div class="text">
                                        <a href="tel:{{option()->phone}}">{{option()->phone}}</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="text">
                                        <a href="mailto:{{option()->email}}">{{option()->email}}</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="text">
                                        <p>{{option()->address}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-7 col-md-7 wow fadeInUp" data-wow-delay="200ms">
                        <div class="footer-widget__column footer-widget__company clearfix">
                            <h3 class="footer-widget__title">اخرین مقالات</h3>
                            <ul class="footer-widget__company-list list-unstyled">
                                @foreach(\App\Article::where('is_active' , '1')->latest()->get() as $article)
                                <li><a href="{{route('single.article' , ['slug' => $article->slug])}}"> {{$article->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-7 col-md-7 wow fadeInUp" data-wow-delay="300ms">
                        <div class="footer-widget__column footer-widget__explore">
                            <h3 class="footer-widget__title">لینک های مفید</h3>
                            <ul class="list-unstyled footer-widget__explore-list">
                                <li><a href="{{route('home')}}">صفحه اصلی</a></li>
                                <li><a href="{{route('contact')}}">تماس با ما</a></li>
                                <li><a href="{{route('about')}}">درباره ما</a></li>
                                <li><a href="{{route('articles')}}">مقالات</a></li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-7 col-md-7 wow fadeInUp" data-wow-delay="300ms">
                        <div class="footer-widget__column footer-widget__explore">
                             <h3 class="footer-widget__title">نماد</h3>
                           <img onclick="window.open('https://trustseal.enamad.ir/?id=238739&amp;Code=tvdWkqIbBoNO0UAU0Q0g','_newtab')" src="https://mahtab-villa.ir/images/nemad.png" alt="" style="cursor:pointer" id="tvdWkqIbBoNO0UAU0Q0g" referrerpolicy="origin">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <div class="site-footer__bottom-left">
                            <div class="footer-widget__social">
                                <a href="{{option()->instagram}}" style="font-family: 'Font Awesome 5 Brands'" class="fa fa-instagram"></a>
                            </div>
                        </div>
                        <div class="site-footer__bottom-right">
                            <p>تمامی حقوق محفوظ است <a href="https://www.instagram.com/A.g.team/">گروه A.G.Team</a></p>
                        </div>
                        <div class="site-footer__bottom-left-arrow">
                            <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><span
                                    class="icon-right-arrow"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Site Footer One End-->


</div><!-- /.page-wrapper -->


<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="{{route('home')}}" aria-label="logo image"><img src="{{option()->image}}" style="transform: scale(2)" width="155"
                                                              alt="{{option()->sitename}}" /></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:{{option()->email}}">{{option()->email}}</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:{{option()->phone}}">{{option()->phone}}</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
                <a href="{{option()->instagram}}" style="font-family: 'Font Awesome 5 Brands'" class="fab fa-instagram"></a>
            </div><!-- /.mobile-nav__social -->
        </div><!-- /.mobile-nav__top -->



    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__content -->

<!-- /.mobile-nav__wrapper -->


<!-- /.search-popup -->


<script src="/assets/vendors/jquery/jquery-3.6.0.min.js"></script>
<script src="/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendors/jarallax/jarallax.min.js"></script>
<script src="/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
<script src="/assets/vendors/jquery-appear/jquery.appear.min.js"></script>
<script src="/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
<script src="/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="/assets/vendors/jquery-validate/jquery.validate.min.js"></script>
<script src="/assets/vendors/nouislider/nouislider.min.js"></script>
<script src="/assets/vendors/odometer/odometer.min.js"></script>
<script src="/assets/vendors/swiper/swiper.min.js"></script>
<script src="/assets/vendors/tiny-slider/tiny-slider.min.js"></script>
<script src="/assets/vendors/wnumb/wNumb.min.js"></script>
<script src="/assets/vendors/wow/wow.js"></script>
<script src="/assets/vendors/isotope/isotope.js"></script>
<script src="/assets/vendors/countdown/countdown.min.js"></script>
<script src="/assets/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="/assets/vendors/twentytwenty/twentytwenty.js"></script>
<script src="/assets/vendors/twentytwenty/jquery.event.move.js"></script>
<script src="/assets/vendors/bxslider/jquery.bxslider.min.js"></script>
<script src="/assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="/assets/vendors/vegas/vegas.min.js"></script>
<script src="/assets/vendors/jquery-ui/jquery-ui.js"></script>
<script src="/assets/vendors/timepicker/timePicker.js"></script>
<script src="/assets/vendors/bootstrap-datepicker.min.js"></script>
<script src="/assets/vendors/bootstrap-datepicker.fa.min.js"></script>


<!-- template js -->
<script src="/assets/js/tevily.js"></script>

@jquery
@toastr_js
@toastr_render
</body>

</html>
