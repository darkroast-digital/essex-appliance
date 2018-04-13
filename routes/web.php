<?php

Auth::routes();

require_once __DIR__ . '/admin.php';

Route::group(['namespace' => 'Theme'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/', 'HomeController@post');
    Route::get('/discover', 'DiscoverController@index')->name('discover');
    Route::get('/discover/{slug}', 'DiscoverController@show')->name('discover.show');
    Route::get('/products', 'ProductsController@index')->name('products');
    Route::get('/products/{name}', 'ProductsController@show')->name('products.show');
    Route::get('/contact-us', 'ContactController@index')->name('contact');
    Route::post('/contact-us', 'ContactController@post');
    Route::get('/services', 'ServicesController@index')->name('services');
});
