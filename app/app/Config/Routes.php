<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/', 'DashboardController::index');
$routes->get('/active-users', 'DashboardController::activeUsers');


// Users 
$routes->get('/users', 'UserController::index');
$routes->get('/user/show', 'UserController::show');
$routes->get('/user/create', 'UserController::create');
$routes->post( '/users/store', 'UserController::store');
$routes->get('/user/edit/(:num)', 'UserController::edit/$1');

// $routes->post('/users/update/(:num)', 'UserController::update/$1');
$routes->post('users/update/(:any)', 'UserController::update/$1');

$routes->get('/user/delete/(:num)', 'UserController::delete/$1');

// Posts 
$routes->get('/posts', 'PostController::index');
$routes->get('/post/create', 'PostController::create');
$routes->post( '/posts/store', 'PostController::store');
$routes->get('/post/edit/(:num)', 'PostController::edit/$1');
$routes->post('/posts/update/(:num)', 'PostController::update/$1');
$routes->get('/post/delete/(:num)', 'PostController::delete/$1');

