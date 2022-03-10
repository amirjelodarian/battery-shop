@if(isset($products))
    <p class="search-result">نتیجه جستجو : <span>{{ count($products) }}</span></p>
    <div class="row" style="width: 100%;margin-top: 10px;margin-bottom:-35px">
        <div class="col-12 text-center">
            {!! $products->appends(['by' => $by, 'search' => $search])->links('layouts.paginate') !!}
        </div>
    </div><br>
    @foreach ($products as $product)
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 product" style="margin-top: 25px">
            <div class="product-inside">
                <div class="margin-b-10">
                    <a class="product-img-box" href="{{ route('product.show', $product->id) }}">
                        <span class="product-brand">{{ $product->brand }}</span>
                        <img class="img-responsive product-img" src={{ $product->photo->fullPath() }} alt="Latest Products Image">
                    </a>
                </div>
                <h3 class="product-title"><a href="{{ route('product.show', $product->id) }}">{{ $product->title  }}</a></h3>
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
    @endforeach
   
@else
    <p class="search-result-not-found">یافت نشد !</p>
@endif