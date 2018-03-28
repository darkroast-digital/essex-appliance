<?php

Route::group(['prefix' => 'panel', 'middleware' => 'auth', 'namespace' => 'Panel', 'as' => 'panel.'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    route::resource('/products', 'ProductsController', ['except' => ['show']]);

    route::resource('/users', 'UsersController', ['except' => ['show']]);
});

Route::post('/media/avatar', 'Media\\AvatarController@store')->name('avatar.store');
