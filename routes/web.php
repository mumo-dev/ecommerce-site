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
    $categories = App\Category::all();
    return view('welcome',compact('categories'));
});

Route::get('/admin', function () {
    return view('admin');
});

Auth::routes();

Route::get('/products/{id}', 'ProductsController@show');

Route::get('/myshoppingcart','ShoppingCartController@index')->middleware('auth')->name('cart');

Route::get('/admin/home', 'AdminController@index')->name('admin.home');
Route::get('/admin/sales', 'SalesController@index')->name('sales.home');
Route::get('/admin/stores', 'StoresController@index')->name('stores.home');


Route::get('/admin/login','Auth\Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login','Auth\Admin\LoginController@login')->name('admin.login.submit');
Route::post('/admin/logout','Auth\Admin\LoginController@logout')->name('admin.logout');
