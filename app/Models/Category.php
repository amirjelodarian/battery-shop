<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function storeCategories($categories, $product)
    {
        // check if exists category just assign to category_product table
        // otherwise create and assign
        foreach ($categories as $category){
            if(! static::whereName($category)->exists())
                $category = static::create(['name' => $category]);
            else
                $category = static::whereName($category)->first();

            $product->attachCategory($category);
        }
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = EnFa($value);
    }
    public function getNameAttribute($value)
    {
        return EnFa($value, 'fa');
    }

}
