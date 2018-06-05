<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();        

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rootCategories = Category::where('parent_id', null)->get();

        return view('admin.categories.create', compact('rootCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [

            'name' => 'bail|required|unique:categories|max:100',
            'description' => 'required|min:5',
            'image' => 'required|image|max:2048'
            ]);

        $image = $request->file('image');
        $imageNewName = time().rand(1,999).'.'.$image->getClientOriginalExtension();
        $image->move(public_path("img"), $imageNewName);

        Category::create([
            'name' => request('name'),
            'description' => request('description'),
            'parent_id' => request('parent'),
            'image' => $imageNewName
            ]);
        return redirect('/admin/categories')
            ->with(['status' => 'категория создана', 'class' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $rootCategories = Category::where('parent_id', null)->get();

        return view('admin.categories.edit', compact('category', 'rootCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request;

        if(!$category = Category::find($id)){
            return redirect('/admin/categories')
                ->with(['status' => 'такой категории нет.', 'class' => 'warning']);
        }


        $this->validate(request(),[

            'name'=> 'bail|required|max:255',
            'description'=>'required',

        ]);

        if($request->hasFile('image')){

            $file = $request->file('image');
            $newImage = rand(0, 100).date("Ymdhis").$file->getClientOriginalName();
            $file->move(public_path().'/img', $newImage);
            $image = $newImage;
        }
        else {

            $image = $category->image;
        }

        $category->name = $input->name;
        $category->description = $input->description;
        $category->parent_id = $input->parent;
        $category->image = $image;

        if($category->update()){

            return redirect('/admin/categories')
                ->with(['status' => 'страница отредактирована', 'class' => 'success']);
        }
        return redirect('/admin/categories')
            ->with(['status' => 'упс что-то пошло не так', 'class' => 'warning']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if(!$category->parent_id){

            $childCatigories = Category::where('parent_id', $category->id)->delete();
        }

        $category->delete();

        return redirect('/admin/categories')
                ->with(['status' => 'Категория удалена.', 'class' => 'success']);
    }
}
