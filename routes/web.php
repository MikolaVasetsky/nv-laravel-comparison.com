<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index');


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
	Route::get('/', function () {
		return view('admin.index');
	})->name('admin');
	Route::resource('type', 'TypeController');
	Route::resource('category', 'CategoryController');
	Route::resource('attribute', 'AttributeController');
	Route::resource('options', 'OptionsController');
	Route::resource('product', 'ProductController');
});
