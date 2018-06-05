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
}
