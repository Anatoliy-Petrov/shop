<?php
use App\Product;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layouts.app');
// })->name('root');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Route::get('/admin', 'Admin\AdminController@index')->middleware('admin')->name('admin');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'],function(){
	
	Route::get('/', 'Admin\AdminController@index')->name('admin');
	// Categories routes
	Route::get('/categories', 'Admin\CategoryController@index');
	Route::get('/categories/edit/{id}', 'Admin\CategoryController@edit');
	Route::get('/categories/create', 'Admin\CategoryController@create');
	Route::post('/categories', 'Admin\CategoryController@store');
	Route::put('/categories/{id}', 'Admin\CategoryController@update');
	Route::delete('/categories/{id}', 'Admin\CategoryController@destroy');

    Route::get('/categories/{id}/attributes', 'Admin\CategoryController@getAttributes');

	// Products routes
	Route::get('/product', 'Admin\ProductController@index');
	Route::get('/product/edit/{id}', 'Admin\ProductController@edit');
	Route::get('/product/create', 'Admin\ProductController@create');
	Route::post('/product', 'Admin\ProductController@store');
	Route::put('/product/{id}', 'Admin\ProductController@update');
	Route::delete('/product/{id}', 'Admin\ProductController@destroy');

    // Attributes routes
    Route::get('/attributes', 'Admin\AttributeController@index');
    Route::get('/attributes/edit/{id}', 'Admin\AttributeController@edit');
    Route::get('/attributes/create', 'Admin\AttributeController@create');
    Route::post('/attributes', 'Admin\AttributeController@store');
    Route::put('/attributes/{id}', 'Admin\AttributeController@update');
    Route::delete('/attributes/{id}', 'Admin\AttributeController@destroy');

    // Options routes
    Route::get('/options', 'Admin\OptionController@index');
    Route::get('/options/edit/{id}', 'Admin\OptionController@edit');
    Route::get('/options/create', 'Admin\OptionController@create');
    Route::post('/options', 'Admin\OptionController@store');
    Route::put('/options/{id}', 'Admin\OptionController@update');
    Route::delete('/options/{id}', 'Admin\OptionController@destroy');

	// Images
	Route::delete('/image/{id}', 'Admin\ImageController@destroy');

	// Users
	Route::get('/user', 'Admin\UserController@index');
	Route::post('/user/up/{id}', 'Admin\UserController@setAdmin');
	Route::post('/user/down/{id}', 'Admin\UserController@setCostumer');
	Route::delete('/user/{id}', 'Admin\UserController@destroy');

});

Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{id}', 'CategoryController@show');

//Route::get('/product', 'ProductController@index');
Route::get('/product/{id}', 'ProductController@show');