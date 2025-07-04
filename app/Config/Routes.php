<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Tugas 2 link url
//$routes->get('/kategori', 'Kategori::index');
//$routes->get('/kategori/(:segment)', 'Kategori::detail/$1');

$routes->get('/home', 'Home::index', ['filter' => 'auth']);
$routes->get('/keranjang', 'TransaksiController::index');
$routes->get('/faq', 'Home::faq');
$routes->get('profile', 'Home::profile', ['filter' => 'auth']);

//Kontak
$routes->get('contact', 'PageController::contact');
$routes->post('contact/send', 'PageController::sendContact');



//CRUD Product
$routes->group('produk', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'ProdukController::index');
    $routes->post('', 'ProdukController::create');
    $routes->post('edit/(:any)', 'ProdukController::edit/$1');
    $routes->get('delete/(:any)', 'ProdukController::delete/$1');
    $routes->get('delete/(:any)', 'ProdukController::delete/$1');
    $routes->get('download', 'ProdukController::download');
});

// CRUD Kategori Produk
$routes->group('kategori', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'ProductCategory::index');
    $routes->post('', 'ProductCategory::create');
    $routes->post('edit/(:any)', 'ProductCategory::edit/$1');
    $routes->get('delete/(:any)', 'ProductCategory::delete/$1');
});

// Keranjang
$routes->group('keranjang', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'TransaksiController::index');
    $routes->post('', 'TransaksiController::cart_add');
    $routes->post('edit', 'TransaksiController::cart_edit');
    $routes->get('delete/(:any)', 'TransaksiController::cart_delete/$1');
    $routes->get('clear', 'TransaksiController::cart_clear');
});
$routes->get('checkout', 'TransaksiController::checkout', ['filter' => 'auth']);
$routes->post('buy', 'TransaksiController::buy', ['filter' => 'auth']);
$routes->get('transaksi/detail/(:num)', 'TransaksiController::detailModal/$1');

//API
$routes->get('get-location', 'TransaksiController::getLocation', ['filter' => 'auth']);
$routes->get('get-cost', 'TransaksiController::getCost', ['filter' => 'auth']);

$routes->group('diskon', ['filter' => 'admin'], function($routes) {
    $routes->get('/', 'DiskonController::index');
    $routes->get('create', 'DiskonController::create');
    $routes->post('store', 'DiskonController::store');
    $routes->get('edit/(:num)', 'DiskonController::edit/$1');
    $routes->post('update/(:num)', 'DiskonController::update/$1');
    $routes->get('delete/(:num)', 'DiskonController::delete/$1');
});




// Untuk Login & Logout
$routes->get('/', 'AuthController::login');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

$routes->resource('api', ['controller' => 'apiController']);