<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\AuthController;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/', 'DashboardController::index');
$routes->get('/active-users', 'DashboardController::activeUsers');


// Users 
$routes->get('/users', 'UserController::index');
$routes->get('/user/show/(:num)', 'UserController::show/$1');
$routes->get('/user/create', 'UserController::create');
$routes->post('/users/store', 'UserController::store');
$routes->get('/user/edit/(:num)', 'UserController::edit/$1');

// $routes->post('/users/update/(:num)', 'UserController::update/$1');
$routes->post('users/update/(:any)', 'UserController::update/$1');

$routes->get('/user/delete/(:num)', 'UserController::delete/$1');

// Posts 
$routes->get('/posts', 'PostController::index');
$routes->get('/post/show/(:num)', 'PostController::show/$1');
$routes->get('/post/create', 'PostController::create');
$routes->post('/post/store', 'PostController::store');
$routes->get('/post/edit/(:num)', 'PostController::edit/$1');
$routes->post('/posts/update/(:num)', 'PostController::update/$1');
$routes->get('/post/delete/(:num)', 'PostController::delete/$1');

// Testing 
$routes->get('test', 'TestController::index');
$routes->get('test/json', 'TestController::usersJson');
$routes->get('test/xml', 'TestController::usersXml');

// Auth 
 $routes->match(['get','post'],'register', 'AuthController::register');
// $routes->get('register', 'AuthController::register');
// $routes->post('register', 'AuthController::register');

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');


