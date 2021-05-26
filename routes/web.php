<?php

use Illuminate\Support\Facades\Route;

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
//     return view('home');
// });

Route::get('/','CDBlogController@index');
Route::get('/blog/{slug}','CDBlogController@blogSingle');
Route::get('/category/{categoryName}/{id}','CDBlogController@categoryIndex');
Route::get('/tag/{tagName}/{id}','CDBlogController@tagIndex');
Route::get('/blogs','CDBlogController@allBlogs');
Route::get('/about','CDBlogController@about');
Route::get('/contact','CDBlogController@contact');
Route::get('/search','CDBlogController@search');

