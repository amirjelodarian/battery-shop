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
        $categories = Category::select('name')->get();
        $brands = Product::pluck('brand');
        $products = Product::with('categories', 'photo')->orderByDesc('id')->paginate(30);
        return view('products', compact(['categories',  'brands', 'products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('name')->get();
        $images = ProductPhoto::select('path','name')->get();
        return view('createProduct', compact(['categories', 'images']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request, ProductPhoto $productPhoto, Category $category)
    {
        $exception =  DB::transaction(function () use ($request, $productPhoto, $category){
            // add photo_id to request for FK product
            $request->request->add(['product_photo_id' => $productPhoto->decidedByNewFileOrOldPic($request)]);
            $product = auth()->user()->products()->create(
                $request->except('product_image_name', 'product_image', 'category')
            );
            // store categories and assign to category_product table
            $category->storeCategories($request->input('category'), $product);
        });
        // upload file if exists in input and
        // transaction is ok
        if (!$exception && $productPhoto->hasFile)
            $request->file('product_image')->move($productPhoto->dirPath, $productPhoto->newUniqueFileName);

        return redirect()->back()->withErrors('Successfully Created');

    }

    public function searchByBrandOrCategory(Request $request)
    {
        if($request->input('by') == 'categories' && $request->input('search') !== null ){

            $categories = $request->input('search');
            
            $products = Product::with('categories')->whereHas('categories', function($query) use ($categories){
                $query->whereIn('name', $categories);
            })->paginate(1);

            return view('productSearch', compact('products'));
        }
//        if($request->input('by') == 'brands'){
//
//        }
//        return response()->json(['errors' => 'Something Wrong !'], 200);
//        return response()->json($request->except('_token'), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
