<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::all();

    	return view('admin.users.index', compact('users'));
    }

    public function destroy($id)
    {
    	$user = User::find($id);
    	$user->delete();

    	return redirect('/admin/user')
                ->with(['status' => 'ползователь удален', 'class' => 'success']);
    }

    public function setAdmin($id)
    {
    	$user = User::find($id);
    	$user->isAdmin = 1;
    	$user->save();

    	return redirect('/admin/user')
                ->with(['status' => 'права изменены', 'class' => 'success']);
    }

    public function setCostumer($id)
    {
    	$user = User::find($id);
    	$user->isAdmin = null;
    	$user->save();

    	return redirect('/admin/user')
                ->with(['status' => 'права изменены', 'class' => 'success']);
    }
}
