<?php
namespace App\Repositories;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductPhoto;
use App\Http\Requests\StoreProductRequest;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductRepository
{
   public function index()
   {
      $CP = $this->searchUtil();
      return [
         'categories' => $CP['categories'],
         'brands'     => $CP['brands'],
         'products'   => Product::with('categories', 'photo')->orderByDesc('id')->paginate(30)
      ];
   }

   public function create()
   {
      return [
         'categories' => Category::select('name')->get(),
         'images'     => ProductPhoto::select('path','name')->get()
      ];
   }

   public function store($request)
   {
      $productPhoto = new ProductPhoto;
      $category = new Category;
      try{
        DB::beginTransaction();
         // add photo_id to request for FK product
         $photoId = $productPhoto->decidedByNewFileOrOldPic($request);
         if($photoId){

            $request->request->add(['product_photo_id' => $photoId]);
            $product = auth()->user()->products()->create(
               $request->except('product_image_name', 'product_image', 'category')
            );
            // store categories and assign to category_product table
            $category->storeCategories($request->input('category'), $product);
         }
         // upload file if exists in input and
         if($productPhoto->hasFile)
            $productPhoto->resizeAndUpload($request->file('product_image'));
        DB::commit();
        // transaction is ok
        return redirect()->back()->withErrors('Successfully Created');

      }
      catch(Exception $e){
        DB::rollBack();
        if(File::exists(public_path('/' . $productPhoto->dirPath . $productPhoto->newUniqueFileName)))
            File::delete(public_path('/' . $productPhoto->dirPath . $productPhoto->newUniqueFileName));
        return redirect()->back()->withErrors('Something Wrong !');
      }
   }

   public function show($id)
   {
      return [
         'product' => Product::whereId($id)->with('categories', 'photo')->firstOrFail()
      ];
   }

   public function edit($id)
   {
      return [
        'categories' => Category::select('name')->get(),
        'images'     => ProductPhoto::select('path','name')->get(),
        'product' => Product::whereId($id)->with('categories', 'photo')->firstOrFail()
      ];
   }

   public function update($request, $id)
   {
      $productPhoto = new ProductPhoto;
      $category = new Category;
      try{
        DB::beginTransaction();
         // add photo_id to request for FK product
         $photoId = $productPhoto->decidedByNewFileOrOldPic($request);
         if($photoId){

            $request->request->add(['product_photo_id' => $photoId]);
            $product = auth()->user()->products()->where('id', $id)->update([
               $request->except('product_image_name', 'product_image', 'category')
            ]);
            // store categories and assign to category_product table
            $category->storeCategories($request->input('category'), $product);
         }
         // upload file if exists in input and
         if($productPhoto->hasFile)
            $productPhoto->resizeAndUpload($request->file('product_image'));
        DB::commit();
        // transaction is ok
        return redirect()->back()->withErrors('Successfully Updated');

      }
      catch(Exception $e){
        DB::rollBack();
        if(File::exists(public_path('/' . $productPhoto->dirPath . $productPhoto->newUniqueFileName)))
            File::delete(public_path('/' . $productPhoto->dirPath . $productPhoto->newUniqueFileName));
        return redirect()->back()->withErrors('Something Wrong !');
      }
   }

   // search by category or brand
   public function search($paginate = 30)
   {
      if(request('search'))
      {
         switch (request('by')) {
            case 'categories':
                  return Product::with('categories')->whereHas('categories', function($query){
                     $query->whereIn('name', request('search'));
                  })->orderByDesc('id')->paginate($paginate);
               break;
            case 'brands':
                  return Product::whereIn('brand', request('search'))->orderByDesc('id')->paginate($paginate);
               break;
            default:
                  return false;
               break;
         }
      }
   }

   // product util for search
   // categories and brands
   public function searchUtil()
   {
      return [
         'categories' => Category::select('name')->get(),
         'brands'     => Product::distinct()->pluck('brand')
      ];
   }
}
?>
