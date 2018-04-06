<?php

Auth::routes();

require_once __DIR__ . '/admin.php';

Route::group(['namespace' => 'Theme'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/products', 'HomeController@products')->name('products');
});
