<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all()->take(12);
        return view('home', compact('products'));
    }
}
