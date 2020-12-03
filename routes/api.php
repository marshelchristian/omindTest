<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

	
Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@login');
Route::get('user', 'App\Http\Controllers\UserController@getAuthenticatedUser')->middleware('jwt.verify');
Route::delete('user-delete/{id}', 'App\Http\Controllers\UserController@getAuthenticatedUser')->middleware('jwt.verify');

Route::get('products', 'App\Http\Controllers\ProductController@product');
Route::get('product-detail/{id}', 'App\Http\Controllers\ProductController@productDetail')->middleware('jwt.verify');
Route::post('product-create', 'App\Http\Controllers\ProductController@addProduct')->middleware('jwt.verify');
Route::put('product-update', 'App\Http\Controllers\ProductController@editProduct')->middleware('jwt.verify');
Route::delete('product-delete/{id}', 'App\Http\Controllers\ProductController@deleteProduct')->middleware('jwt.verify');


