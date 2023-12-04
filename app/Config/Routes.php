<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('artikel', 'Home::artikel');
$routes->get('event', 'Home::event');
$routes->get('filter', 'Home::filter');
$routes->get('logout', 'Authentication::logouT');
$routes->get('signin', 'Authentication::index');
$routes->get('register', 'Authentication::register');
$routes->post('checking', 'Authentication::signIn');
$routes->post('register/process', 'Authentication::signUp');
$routes->get('/detail_lokasi/(:segment)', 'Home::detailLoc/$1');
$routes->get('/detail_event/(:segment)', 'Home::detailEvent/$1');


$routes->group('admin', ['filter' => 'authguard'], function ($routes) {
    $routes->group('', function ($routes) {
        $routes->get('dashboard', 'Admin\Dashboard::index');
        // artikel control
        $routes->get('lokasi/detail_lokasi/(:segment)', 'Admin\Dashboard::detailLoc/$1');
        $routes->get('form_lokasi', 'Admin\AddWisata::index');
        $routes->post('proses_data', 'Admin\AddWisata::ProsesLokasi');
        $routes->get('lokasi/hapus/(:segment)', 'Admin\AddWisata::hapusLokasi/$1');
        $routes->get('lokasi/set_prioritas/(:segment)/(:segment)', 'Admin\AddWisata::setPrioritas/$1/$2');
        // event control
        $routes->get('event/detail_event/(:segment)', 'Admin\Dashboard::detailEvent/$1');
        $routes->get('form_event', 'Admin\AddEvent::index');
        $routes->post('proses_event', 'Admin\AddEvent::ProsesEvent');
        $routes->get('event/hapus/(:segment)', 'Admin\AddEvent::hapusEvent/$1');

        // 
    });
});
// $routes->get('admin/dashboard', 'Admin\Dashboard::index');
