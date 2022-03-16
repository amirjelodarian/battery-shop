@if(isset($products))
    <p class="search-result">نتیجه جستجو : <span>{{ count($products) }}</span></p>
    <div class="row" style="width: 100%;margin-top: 10px;margin-bottom:-35px">
        <div class="col-12 text-center">
            {!! $products->appends(['by' => $by, 'search' => $search])->links('layouts.paginate') !!}
        </div>
    </div><br>
   @include('layouts.productTemplate')

@else
    <p class="search-result-not-found">یافت نشد !</p>
@endif
