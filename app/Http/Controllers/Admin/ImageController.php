<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;

class ImageController extends Controller
{
    public function destroy($id)
    {
    	$image = Image::find($id);

        $image->delete();

        if (request()->expectsJson()){
            return response(['status' => 'image has been deleted.']);
        }

//        return back();
    }
}
