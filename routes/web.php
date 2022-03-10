<?php

use Illuminate\Support\Facades\Auth;
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

//Auth::routes();


Auth::routes();

Route::resource('/', 'HomeController');
Route::any('product/search', 'ProductController@search')->name('product.search');
Route::get('home', 'HomeController@index');
Route::resource('/product', 'ProductController');
