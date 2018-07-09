<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Image;

class Product extends Model
{
    //protected $guarded = [];
    protected $fillable = ['name', 'description', 'price', 'category_id', 'image'];
    protected $with = ['category', 'images'];

    public function category ()
    {
    	return $this->belongsTo(Category::class);
    }

    public function images ()
    {
    	return $this->hasMany(Image::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attribute')->withPivot('options_available');
    }

//    public function colors()
//    {
//        return $this->morphedByMany(Color::class, 'product_attribute');
//    }
//
//    public function sizesFootwear()
//    {
//        return $this->morphedByMany(SizeFootwear::class, 'product_attribute');
//    }
//
//    public function memories()
//    {
//        return $this->morphedByMany(Memory::class, 'product_attribute');
//    }
//
//    public function sizesScreen()
//    {
//        return $this->morphedByMany(SizeScreen::class, 'product_attribute');
//    }
}
