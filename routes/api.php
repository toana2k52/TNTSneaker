<?php

use Illuminate\Http\Request;

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

Route::get('category/{id}','ApiController@category');
Route::post('category-edit/{id}','ApiController@category_edit');

Route::get('product','ApiController@product');
Route::get('product-detail/{id}','ApiController@product_detail');