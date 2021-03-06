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
$routes->setDefaultController('Home');
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
$routes->get('/', 'HomeController::index');

$routes->get('/faq', 'FAQController::page');
$routes->get('/faq/(:num)', 'FAQController::single/$1');

$routes->get('/document', 'DocumentController::index');
$routes->get('/document/new', 'DocumentController::new');
$routes->post('/document/new', 'DocumentController::create');
$routes->get('/document/id/(:num)', 'DocumentController::single/$1');
$routes->get('/document/download/(:num)', 'DocumentController::download/$1');

$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::process');

$routes->get('/staff/lecturer-report', 'LecturerReport::index');

$routes->get('/staff/lecturer-report/upload', 'UploadReport::index');
$routes->post('/staff/lecturer-report/upload', 'UploadReport::upload');

$routes->get('/video-conference', 'VideoConference::index');
$routes->post('/video-conference', 'VideoConference::request');
// TODO
// $routes->get('/profile/(:alphanum)');

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
