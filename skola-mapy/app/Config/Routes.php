<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');
$routes->get('school_add', 'Pages::create');
$routes->post('school_add', 'Pages::school_add');
$routes->get('admitted_add', 'Pages::pocet_prijatych');
$routes->post('admitted_add', 'Pages::admitted_add');
$routes->get('maps', 'Pages::map');

$routes->get('school_edit/(:num)', 'Pages::school_edit/$1');
$routes->put('school_edit/(:num)', 'Pages::school_update/$1');
$routes->get('admitted_delete/(:num)', 'Pages::admitted_delete/$1');

$routes->group('auth', ['namespace' => 'IonAuth\Controllers'], function ($routes) {
$routes->get('/', 'Auth::index');
$routes->add('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->get('forgot_password', 'Auth::forgot_password');

$routes->get('create_group', 'Auth::create_group');
$routes->post('create_group', 'Auth::create_group');

$routes->get('create_user', 'Auth::create_user');
$routes->post('create_user', 'Auth::create_user');

$routes->get('edit_user/(:num)', 'Auth::edit_user/$1');
$routes->post('edit_user/(:num)', 'Auth::edit_user/$1');

$routes->get('edit_group/(:num)', 'Auth::edit_group/$1');
$routes->post('edit_group/(:num)', 'Auth::edit_group/$1');

$routes->get('activate/(:num)', 'Auth::activate/$1');
$routes->post('activate/(:num)', 'Auth::activate/$1');

$routes->get('deactivate/(:num)', 'Auth::deactivate/$1');
$routes->post('deactivate/(:num)', 'Auth::deactivate/$1');
});
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
