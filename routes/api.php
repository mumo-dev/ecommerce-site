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

Route::get('/products','ProductsController@index');
Route::get('/reviews/{product_id}','ProductsController@getReviews');
Route::post('/reviews/{product_id}','ProductsController@postReview');

Route::post('/orders','ShoppingCartController@store');
