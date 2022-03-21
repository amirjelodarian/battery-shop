@extends('layouts.template')
@section('head')
    <link href="{{ asset('/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/select2.min.js') }}" defer></script>
@stop
@section('main')

   <div class="single-product edit-product">
     <div class="container">
      <div class="row">
        <form action="{{ route('product.update', $product->id) }}">
            @csrf
            @method('patch')
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 image">
                <img src={{ $product->photo->fullPath() }} alt="img alt" />
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 battery-details">
                <h1>{{ $product->title }}</h1>
                <div class="product-price"><span>قیمت : </span><input type="text" name="price" value="{{ $product->price }}" /></div>
                <hr />
                <p>
                <span class="title">گارانتی :</span>&nbsp;<span class="title-answer"><input type="text" name="warranty" value="{{ $product->warranty }}" /></span>
                </p>

                <p>
                <span class="title">نام برند :</span>&nbsp;<span class="title-answer"><input type="text" name="brand" value="{{ $product->brand }}" /></span>
                </p>
                <p>
                <span class="title">نوع باتری :</span>&nbsp;<span class="title-answer"><input type="text" name="title" value="{{ $product->title }}" /></span>
                </p>
                <p>
                <span class="title">رده خودرو :</span>&nbsp;<span class="title-answer"><input type="text" name="for_what" value="{{ $product->for_what }}" /></span>
                </p>
                {{-- $product->categories --}}
                <p>
                    <span class="title">شرکت سازنده :</span>&nbsp;<span class="title-answer"><input type="text" name="company" value="{{ $product->company }}" /></span>
                </p>
                <p>
                    <span class="title">مناسب برای :</span>&nbsp;<span class="title-answer">
                        <div class="category-wrapper">
                            <select name="category[]" class="form-control category" multiple="multiple">
                                @foreach($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </span>
                </p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 battery-order-call">
                <p class="call-for-order-text">جهت سفارش با این شماره تماس بگیرید</p>
                <ul class="list-unstyled contact-list">
                    <li><i class="margin-r-10 color-base icon-call-out"></i> ۰۹۲۱ ۵۸۲ ۳۹۵۱</li>
                </ul>
                <p class="battery-order-call-family">جلوداریان</p>
            </div>
        </form>
      </div>
     </div>
   </div>
   @section('footerjs')
        <script>
            $(document).ready(function() {
                $('.category').select2({
                    placeholder: 'ماشین انتخاب کنید',
                    allowClear: true,
                    tags: true,
                });
                $('.close-gallery-wrapper').click(function(){
                    $('.store-gallery').fadeOut(100);
                });
                $('#choose_image').click(function(){
                    $('.store-gallery').fadeIn(100);
                });

                $('.select-new-img-wrapper').click(function() {
                    if(document.getElementById('product_image_name')){
                        document.getElementById('product_image_name').remove();
                    }
                    $('#product_image').click();
                    $('.store-gallery').fadeOut(100);
                });

            });
            function selectImg(imageName){
                // div.style.border = '3px solid #308ce8';
                if(!document.getElementById('product_image_name')){
                    const product_image_name = document.createElement('input');
                    product_image_name.name = "product_image_name";
                    product_image_name.id = "product_image_name";
                    product_image_name.value = imageName;
                    const storeForm = document.getElementById('storeForm');
                    storeForm.appendChild(product_image_name);
                }
                else
                {
                    document.getElementById('product_image_name').value = imageName;
                }
                document.getElementById('product_image').value = "";
                document.querySelector('.store-gallery').style.display = "none";
            }
        </script>
    @stop
@stop
