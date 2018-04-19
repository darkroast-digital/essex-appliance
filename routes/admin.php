<?php

Route::group(['prefix' => 'panel', 'middleware' => 'auth', 'namespace' => 'Panel', 'as' => 'panel.'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    route::resource('/products', 'ProductsController', ['except' => ['show']]);

    Route::post('/variations/store', 'VariationsController@store')->name('variation.store');
    Route::post('/variations/update', 'VariationsController@update')->name('variation.update');

    route::resource('/posts', 'PostsController', ['except' => ['show']]);

    route::resource('/users', 'UsersController', ['except' => ['show']]);

    Route::get('/ads', 'AdsController@index')->name('ads.index');
    Route::patch('/ads', 'AdsController@update')->name('ads.update');

    Route::get('/{type}/categories', 'CategoriesController@index')->name('categories');
    Route::post('/{type}/categories', 'CategoriesController@store');
    Route::delete('/{type}/categories/delete', 'CategoriesController@delete')->name('categories.delete');
});

Route::get('/logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::post('/media/ad', 'Media\\AdImageController@store')->name('adImage.store');
Route::post('/media/avatar', 'Media\\AvatarController@store')->name('avatar.store');
Route::post('/media/post', 'Media\\PostImageController@store')->name('postImage.store');
Route::post('/media/product', 'Media\\ProductImageController@store')->name('productImage.store');
