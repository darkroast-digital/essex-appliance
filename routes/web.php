<?php

Auth::routes();

Route::group(['namespace' => 'Theme'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/products', 'HomeController@products')->name('products');
});
