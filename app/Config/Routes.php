<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setAutoRoute(true);
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');
$routes->get('/komik/create_komik', 'Komik::create_komik');
$routes->get('/komik/Edit_Komik/(:segment)', 'Komik::Edit_Komik/$1');
$routes->get('/komik/(:any)', 'Komik::detail/$1');
$routes->delete('/komik/(:num)', 'Komik::delete_komik/$1');
$routes->get('/komik/save_ubah', 'Komik::save_ubah');
$routes->get('/Komik/Orang', 'Komik::Orang');
// $routes->get('/coba', 'Coba::index');
// $routes->get('/coba', 'Coba::about');
// routes baru
// $this->add('/Coba','Coba::index');

// $routes->get('/coba', 'Coba::coba');
// bisa menjalankan closure/anonymous function
// $routes->get('/coba', function () {
//     echo "Hello Worlds!";
// });
//  /(:any) : placeholder
$routes->get('/coba/(:any)/(:num)', 'Coba::about/$1/$2');
// $routes->get('/coba(:any)','Coba::about/$1');

// kalo ada yang akses controller users namespace nya admin dan contoller nya index;
$routes->get('/users', 'Admin\Users::index');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
