<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>FlameOnePage Free Template by FairTech</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="FlameOnePage freebie theme for web startups by FairTech SEO." name="description"/>
    <meta content="FairTech" name="author"/>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico"/>
    @yield('head')
    @if((string)\Illuminate\Support\Facades\Route::getCurrentRoute()->uri() !== "/"))
        <style>
            .header .nav-item-child{
                color: #515769;
            }
        </style>
    @endif
</head>


<body id="body" data-spy="scroll" data-target=".header">

<header class="header navbar-fixed-top">
    <nav class="navbar" role="navigation">
        <div class="container-fluid">
            <div class="menu-container js_nav-item">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="toggle-icon"></span>
                </button>

                <div class="logo">
                    <a class="logo-wrap" href="#body">
                        <img class="logo-img logo-img-main" src="{{ asset('/img/logo.png') }}" alt="FlameOnePage Logo">
                        <img class="logo-img logo-img-active" src="{{ asset('/img/logo.png') }}" alt="FlameOnePage Dark Logo">
                    </a>
                </div>
            </div>

            <div class="collapse navbar-collapse nav-collapse">

                <!--div class="language-switcher">
                  <ul class="nav-lang">
                    <li><a class="active" href="#">EN</a></li>
                    <li><a href="#">DE</a></li>
                    <li><a href="#">FR</a></li>
                  </ul>
                </div--->

                <div class="menu-container">
                    <ul class="nav navbar-nav navbar-nav-right">
                        <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="{{ route('index') }}/#body">خانه</a></li>
                        <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="{{ route('product.index') }}">محصولات</a></li>
                        <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="{{ route('index') }}/#about">سرویس</a></li>
                        <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="{{ route('index') }}/#products">محصولات جدید</a></li>
                        <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#contact">تماس با ما</a></li>
                        <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="{{ route('index') }}/#why-us">درباره ما</a></li>
                        <li class="js_nav-item nav-item">
                                @unless(auth()->check())
                                    <div class="nav-item-child nav-item-hover login-register">
                                        <a class="login-a" href="{{ route('login') }}">ورود</a>&nbsp;|&nbsp;<a class="register-a" href="{{ route('register') }}">ثبت نام</a>
                                    </div>
                                @endunless
                                @auth
                                    <div class="accounting dropdown show nav-item-child nav-item-hover">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >داشبورد</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <div class="dropmenu-wrapper">
                                                @can('storeProduct')
                                                    <a class="dropdown-item" href="#">پنل مدیریت</a>
                                                    <a class="dropdown-item" href="{{ route('product.create') }}">درج محصول</a>
                                                @endcan
                                                <a class="dropdown-item" href="#">
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
                                                        <input type="submit" class="logout-btn" value="خروج">
                                                    </form>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endauth
                            </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
@yield('main')


<!-- Clients -->
<div class="content-lg container">
    <!-- Swiper Clients -->
    <div class="swiper-slider swiper-clients">
        <!-- Swiper Wrapper -->
        <div class="swiper-wrapper">

            <div class="swiper-slide brand-logo">
                <img class="swiper-clients-img" src="/img/clients/varian.png" alt="Clients Logo">
            </div>

            <div class="swiper-slide brand-logo">
                <img class="swiper-clients-img" src="/img/clients/orbital.png" alt="Clients Logo">
            </div>

            <div class="swiper-slide brand-logo">
                <img class="swiper-clients-img" src="/img/clients/saba.png" alt="Clients Logo">
            </div>

            <div class="swiper-slide brand-logo">
                <img class="swiper-clients-img" src="/img/clients/varian.png" alt="Clients Logo">
            </div>

            <div class="swiper-slide brand-logo">
                <img class="swiper-clients-img" src="/img/clients/suzuki.png" alt="Clients Logo">
            </div>

            <div class="swiper-slide brand-logo">
                <img class="swiper-clients-img" src="/img/clients/sepahan.png" alt="Clients Logo">
            </div>
        </div>
        <!-- End Swiper Wrapper -->
    </div>
    <!-- End Swiper Clients -->
</div>
<!-- End Clients -->
</div>
<!-- End Work -->

<!-- Services -->

<!-- Contact -->
<div id="contact">
    <!-- Contact List -->
    <div class="section-seperator">
        <div class="content-lg container">
            <div class="row">


                <!-- Contact List -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 text-center sm-margin-b-50">
                    <h3><a href="http://ft-seo.ch/">تماس</a> <span class="text-uppercase margin-l-20">جلوداریان</span></h3>
                    <p>در صورت داشتن هرگونه سوال و سفارش محصول می توانید تماس بگیرید</p>
                    <ul class="list-unstyled contact-list">
                        <li><i class="margin-r-10 color-base icon-call-out"></i> 0921 582 3951</li>
                    </ul>
                </div>
                <!-- End Contact List -->


            </div>
            <!--// end row -->
        </div>
    </div>
    <!-- End Contact List -->

    <!-- Google Map -->
    <!--
    <div class="map height-300">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2724.0694570748947!2d7.455080415208266!3d46.94067397914616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478e39d0cf20e8d1%3A0x9daac4cd3043d067!2sThunstrasse+50%2C+3005+Bern%2C+Switzerland!5e0!3m2!1sen!2sin!4v1496749852928" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    -->
</div>
<!-- End Contact -->
<!--========== END PAGE LAYOUT ==========-->
<!--========== FOOTER ==========-->
<footer class="footer">
    <!-- Links -->
    <div class="section-seperator">
        <div class="content-md container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center sm-margin-b-30">
                    <!-- List -->
                    <ul class="list-unstyled footer-list">
                        <li class="footer-list-item"><a href="{{ route('index') }}/#body">خانه</a></li>
                        <li class="footer-list-item"><a href="{{ route('index') }}/#about">سرویس</a></li>
                        <li class="footer-list-item"><a href="{{ route('index') }}/#products">محصولات جدید</a></li>
                        <li class="footer-list-item"><a href="#contact">تماس با ما</a></li>
                    </ul>
                    <!-- End List -->
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center sm-margin-b-30">
                    <!-- List -->
                    <ul class="list-unstyled footer-list">
                        <li class="footer-list-item"><a href="{{ route('product.index') }}">محصولات</a></li>
                        <li class="footer-list-item"><a href="">انتخاب برند باتری</a></li>
                        <li class="footer-list-item"><a href="">انتخاب مدل خودرو</a></li>
                    </ul>
                    <!-- End List -->
                </div>
            </div>
            <!--// end row -->
        </div>
    </div>
    <!-- End Links -->

    <!-- Copyright -->
    <div class="content container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 footer-content">
                <img class="footer-logo" src="{{ asset('/img/logo.png') }}" alt="flameonepage Logo">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 footer-content">
                <p class="margin-b-0">Powered by: <a href="https://github.com/amirjelodarian">Amir Jelodarian &copy; {{ \Carbon\Carbon::now()->year }}</a></p>
            </div>
        </div>
        <!--// end row -->
    </div>
    <!-- End Copyright -->
</footer>
<!--========== END FOOTER ==========-->

<!-- Back To Top -->
<a href="javascript:void(0);" class="js-back-to-top back-to-top">بالا</a>



<script src="{{ asset('/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery-migrate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>


<script src="{{ asset('/js/jquery.easing.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.back-to-top.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.smooth-scroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.wow.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/swiper/js/swiper.jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/masonry/jquery.masonry.pkgd.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/masonry/imagesloaded.pkgd.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/js/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/components/wow.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/components/swiper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/components/masonry.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
@yield('footerjs')


</body>
<!-- END BODY -->
</html>
