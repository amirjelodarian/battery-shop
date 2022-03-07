@if(isset($products))
    <p class="search-result">نتیجه جستجو : <span>{{ count($products) }}</span></p>
    
    @foreach ($products as $product)
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 product" style="margin-top: 25px">
            <div class="product-inside">
                <div class="margin-b-10">
                    <a href="{{ route('product.show', $product->id) }}">
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
    <br>
    <div class="row" style="width: 100%">
        <div class="col-12 text-center">
            {!! $products->appends(['by' => $by, 'search' => $search])->links('layouts.paginate') !!}
        </div>
    </div>
@else
    <p class="search-result-not-found">یافت نشد !</p>
@endif