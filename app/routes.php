<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@homePage');

Route::get('contact', 'HomeController@contact');
Route::post('contact', 'UsersController@getContact');

Route::resource('posts', 'PostsController');

Route::resource('products', 'ProductsController');
Route::get('inventory', 'ProductsController@inventory');
Route::post('inventory', 'ProductsController@updateAll');

Route::get('/login', 'UsersController@loginpage');
Route::post('/login', 'UsersController@doLogin');
Route::get('/logout', 'UsersController@getLogout');
Route::get('/user/create', 'UsersController@createUser');
Route::post('/user/create', 'UsersController@userStore');
Route::post('/user/{id}', 'UsersController@userUpdate');
// Route::post('/user/{id}', 'UsersController@changePassword');
Route::get('user/{id}/account', 'UsersController@account');
Route::post('users/{id}/account', 'UsersController@changePassword');

Route::get('/user/{id}', 'UsersController@userProfile');
// Route::get('/user/{id}/edit', 'UsersController@edit');
Route::get('/user/{id}/posts', 'PostsController@userPosts');

Route::resource('orders', 'OrdersController');
Route::get('confirm/{id}', 'OrdersController@confirm');

Route::get('/ourstory', 'HomeController@ourStory');

Route::get('/events', 'HomeController@events');

Route::post('/order', 'OrdersController@test');

Route::get('/ajax/product-list', 'ProductsController@getProducts');
