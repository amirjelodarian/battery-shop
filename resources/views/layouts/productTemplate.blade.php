@foreach ($products as $product)
<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 product" style="margin-top: 25px">
    <div class="product-inside">
        <div class="margin-b-10">
            <a class="product-img-box" href="{{ route('product.show', $product->id) }}">
                <span class="product-brand">{{ $product->brand }}</span>
                <img class="img-responsive product-img" src={{ $product->photo->fullPath() }} alt="Latest Products Image">
            </a>
        </div>
        <p class="product-title">
            <a href="{{ route('product.show', $product->id) }}">{{ $product->title  }}</a>
        </p>
        <p class="product-car" id="product-car">
            @foreach($product->categories as $category)
                <span class="product-car-wrapper">({{ $category->name }})</span>
            @endforeach
        </p>
        <div class="product-price"><span>قیمت : </span>{{ $product->price }}</div>
        @can('editProduct')
            <a href="{{ route('product.edit', $product->id) }}">
                <button class="btn delete-btn">حذف</button>
            </a>
        @endcan
        <a href="{{ route('product.show', $product->id) }}">
            <button class="btn order-btn">سفارش</button>
        </a>
        @can('editProduct')
            <a href="{{ route('product.edit', $product->id) }}">
                <button class="btn edit-btn">ویرایش</button>
            </a>
        @endcan
    </div>
</div>
@endforeach
