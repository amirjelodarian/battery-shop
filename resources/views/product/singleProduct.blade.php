@extends('layouts.template')
@section('main')
   <div class="single-product">
     <div class="container">
      <div class="row">
         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 image">
            <img src={{ $product->photo->fullPath() }} alt="img alt" />
         </div>
         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 battery-details">
            <h1>{{ $product->title }}</h1>
            <div class="product-price"><span>قیمت : </span>{{ $product->price }}</div>
            <hr />
            <p>
               <span class="title">گارانتی :</span>&nbsp;<span class="title-answer">{{ $product->warranty }}</span>
            </p>

            <p>
               <span class="title">نام برند :</span>&nbsp;<span class="title-answer">{{ $product->brand }}</span>
            </p>
            <p>
               <span class="title">نوع باتری :</span>&nbsp;<span class="title-answer">{{ $product->title }}</span>
            </p>
            <p>
               <span class="title">رده خودرو :</span>&nbsp;<span class="title-answer">{{ $product->for_what }}</span>
            </p>
            <p>
               <span class="title">مناسب برای :</span>&nbsp;<span class="title-answer">
                     @foreach($product->categories as $category)
                        ({{ $category->name }})
                     @endforeach
               </span>
            </p>
            <p>
               <span class="title">شرکت سازنده :</span>&nbsp;<span class="title-answer">{{ $product->company }}</span>
            </p>

         </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 battery-order-call">
               <p>جهت سفارش با این شماره تماس بگیرید</p>
               <ul class="list-unstyled contact-list">
                  <li><i class="margin-r-10 color-base icon-call-out"></i> ۰۹۲۱ ۵۸۲ ۳۹۵۱</li>
               </ul>
               <p class="battery-order-call-family">جلوداریان</p>
          </div>
      </div>
     </div>
   </div>
@stop
