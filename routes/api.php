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

/**
 * Return products data
 *
 * @return mixed
 */
route::get('/colors', 'ColorsController@index')->name('colors.index');
