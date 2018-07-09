<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function show($id)
    {
    	$product = Product::with('attributes')->findOrFail($id);
//        return bcrypt(rand(32, 32));
//        return $product->attributes;

//        foreach ($product ->attributes as $attribute){
//            echo $attribute->name .' '. $attribute->pivot->options_available.'<br>';
//        }

//        foreach ($products->flatMap->attributes as $attribute) {
//            echo $attribute->name .' '. $attribute->pivot->options;
//        }

    	return view('layouts.products.show', compact('product'));
    }
}
