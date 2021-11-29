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
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name("home.index");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//PRODUCT ROUTES
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::post('/products/add/{id}', 'App\Http\Controllers\ProductController@add')->name('product.add');

//CART ROUTES
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');