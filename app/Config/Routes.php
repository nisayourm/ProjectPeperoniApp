<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('User');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */ 

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//set the routes for user
// form login
 $routes->add('/', 'User::index');
//  set to link to register accound
 $routes->add('register', 'User::register');
//  for singin and singout on mune
 $routes->add('signin', 'User::logout');

//set the routes for pizza
 $routes->add('index', 'Pizza::viewsPizza');
 //add pizza
 $routes->add('pizza', 'Pizza::addPizza');
//  update pizza
 $routes->add('edit', 'Pizza::updatePizza');
//  delete pizza
 $routes->add('remove/(:num)', 'Pizza::deletePizza/$1');

 


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
