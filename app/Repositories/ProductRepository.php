<?php
namespace App\Repositories;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductPhoto;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\DB;

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

      $exception = DB::transaction(function () use ($request, $productPhoto, $category){

         // add photo_id to request for FK product
         $photo = $productPhoto->decidedByNewFileOrOldPic($request);
         if($photo){
            $request->request->add(['product_photo_id' => $photo]);
            $product = auth()->user()->products()->create(
               $request->except('product_image_name', 'product_image', 'category')
            );
            // store categories and assign to category_product table
            $category->storeCategories($request->input('category'), $product);
         }
         return redirect()->back()->withErrors('Select image !');
      });
      // upload file if exists in input and
      // transaction is ok
      if ($exception && $productPhoto->hasFile)
         $request->file('product_image')->move($productPhoto->dirPath, $productPhoto->newUniqueFileName);

      return redirect()->back()->withErrors('Successfully Created');

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
         'product' => Product::whereId($id)->with('categories', 'photo')->firstOrFail()
      ];
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
