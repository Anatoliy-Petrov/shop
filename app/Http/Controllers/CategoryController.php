<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();        

        return view('layouts.categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        if(!$category->parent_id){

            $childCategories = Category::where('parent_id', $category->id)->get();
            return view('layouts.categories.show', compact('category', 'childCategories'));
        }
        
        $products = $category->products;

        return view('layouts.categories.show', compact('category', 'products'));
    }
}
