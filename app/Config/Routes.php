<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Kontak::index');

// --- ROUTE UNTUK CRUD KONTAK ---

// Menampilkan form untuk menambah kontak baru
$routes->get('create', 'Kontak::create');

// Menyimpan data kontak baru yang dikirim dari form
$routes->post('store', 'Kontak::store');

// Menampilkan form untuk mengedit kontak berdasarkan ID
$routes->get('edit/(:num)', 'Kontak::edit/$1');

// Memproses pembaruan data yang dikirim dari form edit
$routes->post('update/(:num)', 'Kontak::update/$1');

// Menghapus data kontak berdasarkan ID
$routes->delete('delete/(:num)', 'Kontak::delete/$1');
