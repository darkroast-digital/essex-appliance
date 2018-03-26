<?php


/**
 * Return users data
 *
 * @return mixed
 */
route::resource('/users', 'UsersController');

/**
 * Return products data
 *
 * @return mixed
 */
route::resource('/products', 'ProductsController');
