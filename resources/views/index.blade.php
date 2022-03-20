@extends('layouts.template')
@section('main')

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-aos="fade-down">
            <div class="container">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                </ol>
            </div>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img class="img-responsive" src="img/1920x1080/01.jpg" alt="Slider Image">
                    <div class="container">
                        <div class="carousel-centered">
                            <div class="margin-b-40">
                                <h1 class="carousel-title">فروش باتری</h1>
                                <p class="color-white">باتری های بسیار با کیفیت و مخصوص خودروی شما<br/><i class="margin-r-10 color-base icon-call-out"></i> ۰۹۲۱ ۵۸۲ ۳۹۵۱&nbsp;جلوداریان</p>
                            </div>
                            <a href="{{ route('product.index') }}" class="btn-theme btn-theme-sm btn-white-brd text-uppercase">&nbsp;&nbsp;&nbsp;خرید</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img class="img-responsive" src="img/1920x1080/02.jpg" alt="Slider Image">
                    <div class="container">
                        <div class="carousel-centered">
                            <div class="margin-b-40">
                                <h2 class="carousel-title">باتری ایرانی و خارجی</h2>
                                <p class="color-white">فروش انواع باتری های ایرانی و خارجی <br/><i class="margin-r-10 color-base icon-call-out"></i> ۰۹۲۱ ۵۸۲ ۳۹۵۱&nbsp;جلوداریان</p>
                            </div>
                            <a href="{{ route('product.index') }}" class="btn-theme btn-theme-sm btn-white-brd text-uppercase">&nbsp;&nbsp;&nbsp;سفارش</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--========== SLIDER ==========-->

        <!--========== PAGE LAYOUT ==========-->
        <!-- About -->
        <div id="about">

            <div class="content-lg container">
                <!-- Masonry Grid -->
                <div class="masonry-grid row">
                    <div class="masonry-grid-sizer col-xs-6 col-sm-6 col-md-1"></div>
                    <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4 sm-margin-b-30" data-aos="fade-up">
                      <img class="full-width img-responsive wow fadeInUp" src="img/widgets/about-milad-battrey-1.png" alt="Portfolio Image" data-wow-duration=".3" data-wow-delay=".2s">
                        <div class="margin-b-60">
                            <p class="about-title">ارسال و نصب رایگان باطری ماشین</p>
                            <p>باطری مناسب خودرو در سریع ترین زمان ممکن حمل، و پس از تست سیستم برقی نصب خواهد شد.</p>
                        </div>
                    </div>
                    <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4">
                        <img class="full-width img-responsive wow fadeInUp" src="img/widgets/about-milad-battrey-3.png" alt="Portfolio Image" data-wow-duration=".3" data-wow-delay=".4s">
                       <div class="margin-t-60 margin-b-60">
                           <p class="about-title">جستجو و انتخاب باتری ماشین</p>
                           <p>باتری مناسب خودروی خود را با توجه به برند، مشخصات فنی و قیمت آن انتخاب نمایید.</p>
                       </div>
                   </div>
                    <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4" data-aos="fade-up">
                         <img class="full-width img-responsive wow fadeInUp" src="img/widgets/about-milad-battrey-2.png" alt="Portfolio Image" data-wow-duration=".3" data-wow-delay=".3s">
                        <div class="margin-b-60">
                          <p class="about-title">ثبت سفارش تلفنی باتری ماشین</p>
                          <p>سفارش خود را به صورت تلفنی و شبانه روزی و در تمام ایام سال ثبت نمایید.</p>
                        </div>
                    </div>
				</div>
                <!-- End Masonry Grid -->
            </div>

            <div class="bg-color-sky-light" data-aos="fade-down" id="why-us">
                <div class="content-lg container">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 md-margin-b-60">
                            <div class="margin-t-50 margin-b-30">
                                <p class="about-title">چرا ما ؟</p>
                                <p>میلاد باتری با عرضه انواع باتری های ایرانی و خارجی و با کیفیت به فعالیت می پردازد . میلاد باتری به صورت شبانه روزی و بدون تعطیلی حتی در ایام تعطیل رسمی و غیر رسمی به فعالیت می پردازد . </p>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-7 col-md-offset-2">
                            <!-- Accordion -->
                            <div class="accordion">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <p class="panel-title">
                                                <a class="panel-title-child" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    محصولات
                                                </a>
                                            </p>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                در این صفحه می توانید با دیدن انواع محصولات , باتری مورد نظر خود را پیدا کنید و به صورت تلفنی سفارش دهید
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <p class="panel-title">
                                                <a class="collapsed panel-title-child" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    انتخاب برند باتری
                                                </a>
                                            </p>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                در این صفحه می توانید بر اساس شرکت یا برند سازنده باتری , محصول خود را پیدا کنید و به صورت تلفنی سفارش دهید
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <p class="panel-title">
                                                <a class="collapsed panel-title-child" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    انتخاب مدل خودرو
                                                </a>
                                            </p>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                در این صفحه می توانید با انتخاب مدل خودرویتان , باتری مورد نظرتان را پیدا کنید و به صورت تلفنی سفارش دهید
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Accodrion -->
                        </div>
                    </div>
                    <!--// end row -->
                </div>
            </div>
        </div>
        <!-- End About -->

        <!-- Latest Products -->
        <div id="products">
            <div class="content-lg container">
                <div class="row margin-b-40">
                    <div class="col-sm-12">
                        <p class="new-product-title">محصولات جدید</p>
                    </div>
                </div>
                <!--// end row -->

                <div class="row latest-products">
                    @include('layouts.productTemplate')
                </div>
                <!--// end row -->
            </div>
        </div>
        <!-- End Latest Products -->

@stop
