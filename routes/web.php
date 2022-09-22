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


/*
Route::method('requiredurl',function(){
    // functionality of the functiion
});

Route::method_name('required_url','Controllername@functionName');
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category/index','CategoryController@index')->name('c.index');
Route::get('category/create','CategoryController@create')->name('c.create');

Route::middleware(['auth'])->group(function(){
});
Route::post('category/store','CategoryController@store')->name('c.store');
Route::get('category/edit/{category}','CategoryController@edit')->name('c.edit');

Route::post('category/update','CategoryController@update')->name('c.update');
Route::post('Category/delete','CategoryController@destroy')->name('c.delete');

Route::get('category/show/{category}','CategoryController@show')->name('c.show');
