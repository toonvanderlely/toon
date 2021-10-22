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

Route::redirect('/', '/winkel');
Route::get('/winkel', 'ProductController@index')->name('shop');

Route::get('/winkel/mandje', 'OrderController@cart')->name('cart');
Route::get('/winkel/mandje/verwijder/{key}', 'OrderController@remove')->name('cart.remove');
Route::get('/winkel/bestellen', 'OrderController@order')->name('order');
Route::post('/winkel/bestellen', 'OrderController@pay')->name('pay');
Route::get('/winkel/{product}', 'ProductController@show')->name('products.show');
Route::post('/winkel/{product}', 'ProductController@order')->name('products.order');

Route::get('/bestelling/{order}/{slug}', 'OrderController@show')->name('order.show');
Route::get('/bestelling/{order}/{slug}/cancel', 'OrderController@cancel')->name('order.cancel');

Route::get('/ideal/pay/{order}', 'IdealController@redirect')->name('ideal.pay');
Route::get('/ideal/finish/{order}', 'IdealController@finish')->name('ideal.finish');
Route::get('/ideal/webhook/{order}', 'IdealController@webhook');


Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

    Route::redirect('/', '/admin/orders')->name('admin.home');
    Route::resource('users', 'Admin\UserController', ['as' => 'admin'])->except('show');
    Route::resource('products', 'Admin\ProductController', ['as' => 'admin'])->except('show');
    Route::get('products/{product}/types', 'Admin\ProductController@types')->name('admin.products.types');
    Route::get('products/{product}/types/create', 'Admin\ProductController@types_create')->name('admin.products.types.create');
    Route::post('products/{product}/types/create', 'Admin\ProductController@types_store')->name('admin.products.types.store');
    Route::delete('products/{product}/types/{type}', 'Admin\ProductController@types_delete')->name('admin.products.types.delete');
    
    Route::get('orders/factory', 'Admin\OrderController@factory')->name('admin.orders.factory');
    Route::get('orders/mail', 'Admin\OrderController@mail')->name('admin.orders.mail');        
    Route::post('orders/mail', 'Admin\OrderController@mail_send')->name('admin.orders.mail.send');
    Route::get('orders/packing', 'Admin\OrderController@packing')->name('admin.orders.packing');  
    Route::resource('orders', 'Admin\OrderController', ['as' => 'admin'])->only(['index', 'show', 'destroy']);

});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
