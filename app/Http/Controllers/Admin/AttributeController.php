<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::all();

        return view('admin.attributes.index', compact('attributes'));
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


    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/admin/product')
            ->with(['status' => 'Товар удален.', 'class' => 'success']);
    }

}
