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

Route::post('/feedback/store','BlogController@storeFeedback')->name('feedback.blog');
Route::get('/feedback/edit/{id}','BlogController@editFeedback')->name('feedback.edit');
Route::post('/feedback/update/{id}','BlogController@updateFeedback')->name('feedback.update');
Route::get('/feedback/delete/{id}','BlogController@destroyFeedback')->name('feedback.delete');


Route::get('/test','TestController@index')->name('test.index');

Route::get('/user','AdminController@author')->name('admin.author');
Route::get('/user/detail/{id}','AdminController@detail')->name('admin.author');
Route::get('/blog','AdminController@blog')->name('blog.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

