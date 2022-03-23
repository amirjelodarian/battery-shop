@extends('layouts.template')
@section('head')
    <link href="{{ asset('/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/select2.min.js') }}" defer></script>
@stop
@section('main')

   <div class="single-product edit-product">
     <div class="container">
      <div class="row">
        <form action="{{ route('product.update', $product->id) }}" method="POST" id="editForm" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 image">
                <img id="edit_picture" src={{ $product->photo->fullPath() }} alt="img alt" />
                <br />
                <input type="button" id="choose_image" class="choose-img-btn btn" value="انتخاب عکس >" />
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 battery-details">
                <div class="row">
                    <div class="col-sm-12">
                        <p class="new-product-title text">ویرایش محصول</p>
                        @if($errors->count() > 0)
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
                <h1><input type="text" class="edit-product-title" name="title" value="{{ $product->title }}" /></h1>
                <div class="product-price"><span>قیمت : </span><input type="text" name="price" value="{{ $product->price }}" /></div>
                <hr />
                <p>
                <span class="title">گارانتی :</span>&nbsp;<span class="title-answer"><input type="text" name="warranty" value="{{ $product->warranty }}" /></span>
                </p>

                <p>
                <span class="title">نام برند :</span>&nbsp;<span class="title-answer"><input type="text" name="brand" value="{{ $product->brand }}" /></span>
                </p>
                <p>
                <span class="title">نوع باتری :</span>&nbsp;<span class="title-answer"><input type="text" name="type" value="{{ $product->type }}" /></span>
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
                        <select name="category[]" class="form-control category" multiple="multiple">
                            @foreach($categories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </span>
                </p>
                <p class="text-center">
                    <input type="submit" class="btn btn-primary" value="اعمال تغییرات" />
                </p>
            </div>
            <div class="store-gallery">
                <div class="container store-product-image-gallery">
                    <div class="row store-product-image-gallery-wrapper">
                        <div class="close-gallery">
                            <div class="close-gallery-wrapper">
                                x
                            </div>
                        </div>
                        <div class="select-new-img">
                            <button type="button" class="select-new-img-wrapper">انتخاب عکس جدید +</button>
                        </div>
                        <input type="file" id="product_image" class="hidden" name="product_image" />
                        <input type="text" class="hidden" value="{{ $product->photo->name }}" id="product_image_name" class="hidden" name="product_image_name" />

                        <div class="store-gallery-img">
                            @foreach($images as $image)
                                <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2">
                                    <img src={{ asset("{$image->path}{$image->name}") }} onclick="selectImg('{{ $image->name }}')" class="img-fluid img-thumbnail" alt="gallery" />
                                </div>
                            @endforeach
                         </div>

                    </div>
                </div>
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
                document.getElementById('product_image').value = "";
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
                    const editForm = document.getElementById('editForm');
                    editForm.appendChild(product_image_name);
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
