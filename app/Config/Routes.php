<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('filter', 'Home::filter');
$routes->get('logout', 'Authentication::logouT');
$routes->get('signin', 'Authentication::index');
$routes->post('checking', 'Authentication::signIn');
$routes->get('/detail_lokasi/(:segment)', 'Home::detailLoc/$1');


$routes->group('admin', ['filter' => 'authguard'], function ($routes) {
    $routes->group('', function ($routes) {
        $routes->get('dashboard', 'Admin\Dashboard::index');
        $routes->get('lokasi/detail_lokasi/(:segment)', 'Admin\Dashboard::detailLoc/$1');
        $routes->get('form_lokasi', 'Admin\AddWisata::index');
        $routes->post('proses_data', 'Admin\AddWisata::ProsesLokasi');
        $routes->get('lokasi/hapus/(:segment)', 'Admin\AddWisata::hapusLokasi/$1');
        $routes->get('lokasi/set_prioritas/(:segment)/(:segment)', 'Admin\AddWisata::setPrioritas/$1/$2');
        // 
    });
});
// $routes->get('admin/dashboard', 'Admin\Dashboard::index');
