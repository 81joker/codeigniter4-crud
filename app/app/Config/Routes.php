<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/posts', 'PostController::index');
$routes->get('/post/create', 'PostController::create');
$routes->post( '/posts/store', 'PostController::store');
$routes->get('/post/edit/(:num)', 'PostController::edit/$1');
$routes->post('/posts/update/(:num)', 'PostController::update/$1');
$routes->get('/post/delete/(:num)', 'PostController::delete/$1');

