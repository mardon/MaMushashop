<?php

Route::get('/', 'HomeController@index');

Route::post('/addcart', 'CartController@postAdd');
Route::get('/cart','CartController@index');

Route::get('/checkout','CheckoutController@index');
Route::post('/checkout', 'CheckoutController@add');

Route::group(['middleware' => ['web']], function() {
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});
Route::group(['prefix' => 'admin',  'middleware' => 'admin'],function () {
    Route::get('/', 'AdminController@index');
    Route::get('detail/{id}', 'AdminController@detail');
    Route::get('status/{id}', 'AdminController@status');
    Route::get('products', 'ProductController@index');
    Route::get('product/edit/{id}', 'ProductController@edit');
    Route::post('product/update/{id}', 'ProductController@update');
});
