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
}
