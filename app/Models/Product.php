<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function photo(){
        return $this->belongsTo(ProductPhoto::class, 'product_photo_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function attachCategory(Category $category)
    {
        return $this->categories()->attach($category);
    }

    public function detachCategory(Category $category)
    {
        return $this->categories()->detach($category);
    }

    public function syncCategory(Category $category)
    {
        return $this->categories()->sync($category);
    }

    public function hasCategory($category)
    {
        if (is_string($category))
           return $this->categories->contains('name',$category);

        return !! $category->intersect($this->categories)->count();
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = Str::replace(',','',EnFa($value));
    }
    public function getPriceAttribute($value)
    {
        return EnFa(number_format(EnFa($value)), 'fa');
    }
}
