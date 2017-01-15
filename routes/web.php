<?php

Route::get('/', 'HomeController@index');

Route::post('/addcart', 'CartController@postAdd');
Route::get('/cart','CartController@index');

Route::get('/checkout','CheckoutController@index');
Route::post('/checkout', 'CheckoutController@add');
