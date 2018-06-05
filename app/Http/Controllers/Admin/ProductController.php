<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();        

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('parent_id', '>', 0)->get();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [

            'name' => 'bail|required|unique:categories|max:100',
            'description' => 'required|min:5',
            'price' => 'required|integer',
            'image' => 'required|image|max:2048',
            'category' => 'required|integer|exists:categories,id'
            ]);

        $image = $request->file('image');
        $imageNewName = time().rand(1,999).'.'.$image->getClientOriginalExtension();
        $image->move(public_path("img"), $imageNewName);

        Product::create([
            'name' => request('name'),
            'price' => request('price'),
            'description' => request('description'),
            'category_id' => request('category'),
            'image' => $imageNewName
            ]);
        return redirect('/admin/product')
            ->with(['status' => 'товар создан', 'class' => 'success']);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('parent_id', '>', 0)->get();
        $images = Image::where('product_id', $id)->get();

        return view('admin.products.edit', compact('product', 'categories', 'images'));
    }

    public function update(Request $request, $id)
    {
        $input = $request;

        if(!$product = Product::find($id)){
            return redirect('/admin/product')
                ->with(['status' => 'такого товара нет.', 'class' => 'warning']);
        }

        $this->validate(request(),[

            'name'=> 'bail|required|max:100',
            'price' => 'required|integer',
            'description'=>'required',
            'category_id' => 'required|integer|exists:categories,id'
        ]);

        if($request->hasFile('image')){

            $file = $request->file('image');
            $newImage = time().rand(1,999).'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/img', $newImage);
            $image = $newImage;
        }
        else {

            $image = $product->image;
        }

        $product->name = $input->name;
        $product->price = $input->price;
        $product->description = $input->description;
        $product->image = $image;

        if($request->hasFile('gal_image')){

            $gal_file = $request->file('gal_image');
            $newGalImage = time().rand(1,999).'.'.$gal_file->getClientOriginalExtension();
            $gal_file->move(public_path().'/img', $newGalImage);

            Image::create([
                'path' => $newGalImage,
                'product_id' => $product->id,
            ]);
        }
    

        if($product->update()){

            return redirect('/admin/product')
                ->with(['status' => 'товар отредактирован', 'class' => 'success']);
        }
        return redirect('/admin/product')
            ->with(['status' => 'упс что-то пошло не так', 'class' => 'warning']);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/admin/product')
                ->with(['status' => 'Товар удален.', 'class' => 'success']);
    }
}
