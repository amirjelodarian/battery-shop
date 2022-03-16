<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:storeProduct')->only('create','store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.products', resolve(ProductRepository::class)->index());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.createProduct', resolve(ProductRepository::class)->create());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        return resolve(ProductRepository::class)->store($request);
    }

    public function search(Request $request)
    {
        // post method is ajax
        // get method is after search pagination
        $products = resolve(ProductRepository::class)->search();
        // when have page means user go to next page when searching

        if($request->has('page') && $products){
            $CP = resolve(ProductRepository::class)->searchUtil();
            return view('product.products', [
                'products'   => $products,
                'categories' => $CP['categories'],
                'brands'     => $CP['brands'],
                'by'         => request('by'),
                'search'     => request('search')
            ]);
        }
        if($products)
            return view('product.productSearch', [
                'products'   => $products,
                'by'         => request('by'),
                'search'     => request('search')
            ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('product.singleProduct', resolve(ProductRepository::class)->show($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('product.editProduct', resolve(ProductRepository::class)->edit($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
