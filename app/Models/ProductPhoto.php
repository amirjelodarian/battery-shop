<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;

class ProductPhoto extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $newUniqueFileName;
    public $dirPath;
    public $hasFile = false;

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function storePhoto($file, $dirPath) : int
    {
        $this->newUniqueFileName = $this->newUniqueFileName($file);
        $this->dirPath = $dirPath;
        $dirPathForDB = '/' . $dirPath;
        $photo = ProductPhoto::create([
            'path' => $dirPathForDB,
            'name' => $this->newUniqueFileName
        ]);
        return $photo->id;
    }

    private function newUniqueFileName($file) : string
    {
        $newUniqueFileName = Str::random(16) . '.' . $file->extension();
        while(ProductPhoto::whereName($newUniqueFileName)->exists())
            $newUniqueFileName = Str::random(16) . '.' . $file->extension();
        return $newUniqueFileName;
    }

    public function fullPath()
    {
        return $this->path . $this->name;
    }

    public function decidedByNewFileOrOldPic($request, $dirPath = 'img/products/')
    {
        switch ($request)
        {
            case $request->hasFile('product_image'):
                    $photoId = $this->storePhoto(
                        $request->file('product_image'),
                        $dirPath
                    );
                    $this->hasFile = true;
                    return $photoId;
                break;
            case $request->input('product_image_name'):
                    $photo = static::select('id')->whereName(
                        $request->input('product_image_name')
                    )->first();
                    $this->hasFile = false;
                    return $photo->id;
                break;
            case ($request->input('product_image_name') || $request->hasFile('product_image')):
                    $photo = static::select('id')->whereName(
                        $request->input('product_image_name')
                    )->first();
                    $this->hasFile = false;
                    return $photo->id;
                break;
            default:
                    return false;
                break;
        }
    }

    public function resizeAndUpload($orgImg)
    {
        if(! file_exists(public_path('img/products')))
            File::makeDirectory(public_path('img/products'));

        $thumbImg = Image::make($orgImg);
        $thumbImg->resize(310, 320)->save($this->dirPath . $this->newUniqueFileName, 100);
        // $request->file('product_image')->move($this->dirPath, $this->newUniqueFileName);
    }


}
