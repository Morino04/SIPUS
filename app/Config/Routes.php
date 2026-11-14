<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->post('logout', 'Auth::logout', ['filter' => 'auth']);

$routes->group('', ['filter' => 'auth'], static function ($routes): void {
    $routes->get('/', 'Dashboard::index');
    $routes->get('dashboard', 'Dashboard::index');

    $routes->get('categories', 'Categories::index');
    $routes->get('books', 'Books::index');
    $routes->get('members', 'Members::index');

    $routes->group('', ['filter' => 'role:admin'], static function ($routes): void {
        $routes->get('categories/add', 'Categories::new');
        $routes->get('categories/new', 'Categories::new');
        $routes->post('categories/create', 'Categories::create');
        $routes->get('categories/edit/(:num)', 'Categories::edit/$1');
        $routes->post('categories/update/(:num)', 'Categories::update/$1');
        $routes->post('categories/delete/(:num)', 'Categories::delete/$1');

        $routes->get('books/new', 'Books::new');
        $routes->post('books/create', 'Books::create');
        $routes->get('books/edit/(:num)', 'Books::edit/$1');
        $routes->post('books/update/(:num)', 'Books::update/$1');
        $routes->post('books/delete/(:num)', 'Books::delete/$1');

        $routes->get('members/new', 'Members::new');
        $routes->post('members/create', 'Members::create');
        $routes->get('members/edit/(:num)', 'Members::edit/$1');
        $routes->post('members/update/(:num)', 'Members::update/$1');
        $routes->post('members/delete/(:num)', 'Members::delete/$1');

        $routes->get('users', 'Users::index');
        $routes->post('users/create', 'Users::create');
    });
});