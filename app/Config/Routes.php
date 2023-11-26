<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->setAutoRoute(false);

// route group auth (login, signup)
$routes->group('auth', function ($routes) {
    $routes->get('register', 'AuthController::register');
    $routes->get('edit', 'AuthController::edit');
    $routes->post('login', 'AuthController::processLogin');
    $routes->post('signup', 'AuthController::processSignup');
    $routes->post('update', 'AuthController::update');
    $routes->post('updateimage', 'AuthController::updateImage');
    $routes->post('logout', 'AuthController::logout');
});

// home group
$routes->group('home', ['filter' => 'userFilter'], function($routes) {
    $routes->get('index', 'HomeController::index');
});

// topup group
$routes->group('topup', ['filter' => 'userFilter'], function($routes) {
    $routes->get('index', 'TopUpController::index');
    $routes->post('create', 'TopUpController::create');
});

// pembayaran listrik grup
$routes->group('PLN', ['filter' => 'userFilter'], function($routes) {
    $routes->get('index', 'ListrikController::index');
    $routes->post('create', 'ListrikController::create');
});

// balance group
$routes->group('balance', ['filter' => 'userFilter'], function($routes) {
    $routes->get('index', 'BalanceController::index');
});

// transaksi group
$routes->group('transaction', ['filter' => 'userFilter'], function($routes) {
    // $routes->get('index', 'TransactionController::index');
    $routes->get('index/(:any)', 'TransactionController::index/$1');
});