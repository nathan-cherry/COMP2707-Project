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

//Route::get('/', function () {
//    return view('pages.splash');
//});
//
//Route::get('/test', function () {
//    return view('test');
//});

Route::get('/', 'PageController@index');


// Product Controller
Route::get('/products/men', 'ProductsController@men');
Route::get('/products/women', 'ProductsController@women');
Route::get('/products/kids', 'ProductsController@kids');
Route::resource('products', 'ProductsController');


// Cart Controller
Route::resource('cart', 'CartController');
Route::get('/cart/create/{id}', 'CartController@createOrder');
Route::delete('/cart/{id}/buy', 'CartController@buy');

// Auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Admin Controller
Route::get('/admin', 'AdminController@index');
Route::get('/admin/orders', 'AdminController@showOrders');
Route::get('/admin/products', 'AdminController@showProducts');
Route::get('/admin/users', 'AdminController@showUsers');

Route::get('/admin/user/{id}/edit', 'AdminController@editUser');
Route::put('/admin/user/{id}', 'AdminController@updateUser');
Route::delete('/admin/user/{id}', 'AdminController@destroyUser');

