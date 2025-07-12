<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Atur halaman utama agar langsung menampilkan daftar kontak.
$routes->get('/', 'Kontak::index');

// --- RUTE UNTUK CRUD KONTAK ---

// R - Read: Menampilkan semua kontak
// $routes->get('kontak', 'Kontak::index');

// C - Create: Menampilkan form untuk menambah kontak baru
$routes->get('create', 'Kontak::create');

// C - Create: Menyimpan data kontak baru yang dikirim dari form
$routes->post('store', 'Kontak::store');

// U - Update: Menampilkan form untuk mengedit kontak berdasarkan ID
$routes->get('edit/(:num)', 'Kontak::edit/$1');

// U - Update: Memproses pembaruan data yang dikirim dari form edit
$routes->post('update/(:num)', 'Kontak::update/$1');

// D - Delete: Menghapus data kontak berdasarkan ID
$routes->delete('delete/(:num)', 'Kontak::delete/$1');