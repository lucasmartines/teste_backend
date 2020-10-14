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
 * Login
 * --------------------------------------------------------------------
 */


$routes->get("/",'UserPage::index');



/**
 * --------------------------------------------------------------------
 * SIGN IN
 * --------------------------------------------------------------------
 */


# list all 
$routes->get("/list/search",'ListPage::search');
$routes->get("/list",'ListPage::index');


# edit one
$routes->match(["get","post"] , "/list/(:segment)/edit","ListPage::modifyView/$1");

# create one
$routes->match(["get","post"] , "/list/create","ListPage::createView");



# view one
$routes->match(["get"] , "/list/(:segment)","ListPage::viewOne/$1");
# delete one
$routes->match(["post"] , "/list/(:segment)/delete","ListPage::delete/$1");



//$routes->get("/list",'ListPage::index');



// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->match( ["get","post"],'/news/(:segment)/update', 'News::update/$1');
// $routes->match( ["get","post"] , '/news/create', 'News::create');
// $routes->get('/news/(:segment)', 'News::view/$1');
// $routes->get('/news/search/(:s)', 'News::index/$1');
// $routes->get('/news', 'News::index');


// $routes->get("/","Home::index");
// $routes->get('(:any)', 'Pages::view/$1');

//$routes->get('(:any)', 'Home::index');



/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
