@extends('layouts.template')
@section('head')
    <link href="{{ asset('/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/select2.min.js') }}" defer></script>
@stop
@section('main')


        <div id="products">
            <div class="content-lg container store-product">
                <div class="row margin-b-40">
                    <div class="col-sm-12">
                        <p class="new-product-title text">درج محصول</p>
                        @if($errors->count() > 0)
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!--// end row -->

                <div class="row">
                    <form action="{{ route('product.store') }}" method="POST" id="storeForm" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-3 col-md-3 col-lg-4"></div>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <label for="company">شرکت سازنده</label>
                                <div class="form-group"><input type="text" name="company" value="{{ old('company') }}" placeholder="شرکت صبا باطری" class="form-control"></div>
                                <label for="brand">برند</label>
                                <div class="form-group"><input type="text" name="brand" value="{{ old('brand') }}" placeholder="واریان" class="form-control"></div>
                                <label for="for_what">رده خودرو</label>
                                <div class="form-group"><input type="text" name="for_what" value="{{ old('for_what') }}" placeholder="خودروهای سواری" class="form-control"></div>
                                <input type="file" id="product_image" class="hidden" name="product_image" />

                                <label for="choose_image">عکس باتری</label>
                                <div class="form-group"><input type="button" id="choose_image" class="choose-img-btn btn" value="< انتخاب عکس" /></div>

                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <label for="title">نام باتری</label>
                                <div class="form-group"><input type="text" name="title" value="{{ old('title') }}" placeholder="باتری ۶۰ آمپر گلوبال" class="form-control"></div>
                                <label for="type">نوع باتری</label>
                                <div class="form-group"><input type="text" name="type" value="{{ old('type') }}" placeholder="اتمی" class="form-control"></div>
                                <label for="warranty">گارانتی</label>
                                <div class="form-group"><input type="text" name="warranty" value="{{ old('warranty') }}" placeholder="کاغذی ۱۲ ماهه" class="form-control"></div>
                                <label for="category">دسته بندی</label>
                                <div class="form-group">
                                    <div class="category-wrapper">
                                        <select name="category[]" class="form-control category" multiple="multiple">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-xs-3 col-sm-3"></div>
                                <div class="col-xs-6 col-sm-6">
                                    <label for="price">قیمت</label>
                                    <div class="form-group"><input type="text" name="price" value="{{ old('price') }}" placeholder="800000" class="form-control"></div>
                                </div>
                                <div class="col-xs-3 col-sm-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3 col-sm-3"></div>
                                <div class="col-xs-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="submit-store-product">
                                            <input type="submit" class="form-control btn btn-primary" value="درج" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3"></div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-4"></div>
                    </form>
                </div>
                <!--// end row -->
            </div>
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
                        <button class="select-new-img-wrapper">انتخاب عکس جدید +</button>
                    </div>
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
