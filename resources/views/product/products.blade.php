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
                                    <select name="brands" class="form-control brand" multiple="multiple" onchange="search(this, 'brand')">
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
                                    <select name="categories"  class="form-control category" multiple="multiple" onchange="search(this, 'category')">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="loader-outside">
                    <div class="loader"></div>
                </div>
                <div class="row latest-products" id="search-product">

                </div>
                <div class="row latest-products" id="main-product">
                    @include('layouts.productTemplate')
                </div>
                     <!--// end row -->

            </div>
            <div class="row">
                <div class="col-12 text-center">
                    @if(app('request')->has('search'))
                      {!! $products->appends([
                                'by'     => app('request')->input('by'),
                                'search' => app('request')->input('search')
                         ])->links('layouts.paginate') !!}
                    @else
                      {!! $products->links('layouts.paginate') !!}
                    @endif
                </div>
            </div>
        </div>
        <!-- End Latest Products -->
        @section('footerjs')
            <script>
                $(document).ready(function() {
                    $('.loader-outside').hide();
                    $('.brand').select2({
                        placeholder: 'برند انتخاب کنید',
                        allowClear: true,
                    });
                    $('.category').select2({
                        placeholder: 'ماشین انتخاب کنید',
                        allowClear: true,
                    });
                });
                function search(div, divClassName) {
                    const allValues = [];
                    const selectOption = document.querySelector('#' + div.parentElement.id + ' .select2-selection__rendered');
                    for (let index = 1; index < selectOption.childElementCount; index++)
                        selectOption.childNodes[index].title !== '' ?
                        allValues.push(selectOption.childNodes[index].title) : null;
                    if (allValues != ''){
                        $.ajax({
                            method: "POST",
                            beforeSend: function() {
                                $('.loader-outside').show();
                            },
                            url: "{{ route('product.search') }}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                by: div.parentElement.id,
                                search:  allValues
                            },
                            success: function (data){
                                $("#main-product,.loader-outside").hide();
                                $("#search-product").show();
                                $("#search-product").html(data);
                                if (data == "" || data == null){
                                  $("#main-product").show();
                                }


                            },
                        });
                    }
                    else{
                        $("#main-product").show();
                        $("#search-product").hide();
                    }
                }
            </script>
        @stop
@stop
