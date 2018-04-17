<?php


/**
 * Return users data
 *
 * @return mixed
 */
route::resource('/users', 'UsersController', ['only' => ['index', 'show']]);

/**
 * Return products data
 *
 * @return mixed
 */
route::resource('/products', 'ProductsController', ['only' => ['index', 'show']]);

/**
 * Return products data
 *
 * @return mixed
 */
route::resource('/variations', 'VariationsController', ['only' => ['index', 'show']]);
Route::get('/variations/product/{prodicutId}', 'VariationsController@showSpecific')->name('variations.specific');

/**
 * Return products data
 *
 * @return mixed
 */
route::get('/colors', 'ColorsController@index')->name('colors.index');

/**
 * Return products data
 *
 * @return mixed
 */
route::get('/categories', 'CategoriesController@index')->name('categories.index');

/**
 * Return products data
 *
 * @return mixed
 */
route::get('/brands', 'BrandsController@index')->name('brands.index');
