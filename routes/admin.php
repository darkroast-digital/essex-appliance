<?php

Route::group(['prefix' => 'panel', 'middleware' => 'auth', 'namespace' => 'Panel', 'as' => 'panel.'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
