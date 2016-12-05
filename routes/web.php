<?php

Route::get('/', 'HomeController@index');

Route::post('/addcart', 'CartController@postAdd');
Route::get('/cart','CartController@index');
