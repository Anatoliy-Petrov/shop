<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'parent_id', 'image'];
    //protected $with = ['products'];

    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function hasProduct($id)
    {
    	$product = Product::where('category_id', $id)->first();
    	if($product){
    		return true;
    	}
    	return false;
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'category_attribute');
    }
//    public function colors()
//    {
//        return $this->morphedByMany(Color::class, 'category_attribute');
//    }
//
//    public function sizesFootwear()
//    {
//        return $this->morphedByMany(SizeFootwear::class, 'category_attribute');
//    }
//
//    public function memories()
//    {
//        return $this->morphedByMany(Memory::class, 'category_attribute');
//    }
//
//    public function sizesScreen()
//    {
//        return $this->morphedByMany(SizeScreen::class, 'category_attribute');
//    }
}
