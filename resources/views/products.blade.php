@extends('layouts.template')
@section('head')
    <link href="{{ asset('/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/select2.min.js') }}" defer></script>
@stop
@section('main')

        <!-- Latest Products -->
        <div id="products">
            <div class="content-lg container">
                <div class="row margin-b-40">
                    <div class="col-sm-12">
                        <h2 class="new-product-title">محصولات</h2>
                    </div>
                </div>
                <!--// end row -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="search">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="by-brand">
                                <p>جستجو بر اساس برند باتری :</p>
                                <div class="brand-wrapper" id="brands">
                                    <select name="brands" class="form-control brand" multiple="multiple" onchange="search(this)">
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand }}">{{ $brand }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="by-category">
                                <p>جستجو بر اساس مدل خودرو :</p>
                                <div class="category-wrapper" id="categories">
                                    <select name="categories"  class="form-control category" multiple="multiple" onchange="search(this)">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row latest-products" id="search-product">
               
                </div>
                <div class="row latest-products" id="main-product">
                    @foreach($products as $product)
                    <!-- Latest Products -->
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 product">
                            <div class="product-inside">
                                <div class="margin-b-10">
                                    <a href="{{ route('product.show', $product->id) }}">
                                        <img class="img-responsive product-img" src="{{ $product->photo->fullPath() }}" alt="Latest Products Image">
                                    </a>
                                </div>
                                <h3 class="product-title"><a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a></h3>
                                <p class="product-car">
                                    @foreach($product->categories as $category)
                                        ({{ $category->name }})
                                    @endforeach
                                </p>
                                <div class="product-price">{{ $product->price }}</div>
                                <a href="{{ route('product.show', $product->id) }}">
                                    <button class="btn order-btn">سفارش</button>
                                </a>
                            </div>
                        </div>
                    <!-- End Latest Products -->
                    @endforeach
                </div>
                     <!--// end row -->

            </div>
            <div class="row">
                <div class="col-12 text-center">
                    {!! $products->links('layouts.paginate') !!}
                </div>
            </div>
        </div>
        <!-- End Latest Products -->
        @section('footerjs')
            <script>
                $(document).ready(function() {
                    $('.brand').select2({
                        placeholder: 'برند انتخاب کنید',
                        allowClear: true,
                    });
                    $('.category').select2({
                        placeholder: 'ماشین انتخاب کنید',
                        allowClear: true,
                    });
                });
                function search(div) {
                    const allValues = [];
                    const selectOption = document.querySelector('#' + div.parentElement.id + ' .select2-selection__rendered');
                    for (let index = 1; index < selectOption.childElementCount; index++)
                        selectOption.childNodes[index].title !== '' ?
                        allValues.push(selectOption.childNodes[index].title) : null;

                    $.ajax({
                        method: "POST",
                        url: "{{ route('product.searchByBrandOrCategory') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            by: div.parentElement.id,
                            search:  allValues
                        },
                        success: function (data){
                            if($('.category').val() == ""){
                                $("#main-product").show();
                                $("#search-product").hide();
                            } else{
                                $("#main-product").hide();
                                $("#search-product").html(data);
                            }
                            
                        },
                    });
                }
            </script>
        @stop
@stop
