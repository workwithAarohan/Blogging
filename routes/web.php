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

Route::resource('/category','CategoryController');
Route::get('/del_category/{cat_id}','CategoryController@destroy')->name('delete.category');

Route::resource('/blog','BlogController');
Route::get('/del_blog/{blog_id}','BlogController@destroy')->name('delete.blog');

Route::get('/test','TestController@index')->name('test.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

