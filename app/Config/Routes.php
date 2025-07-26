<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Kontak::index', ['filter' => 'auth']);

// Ini tidak dilindungi oleh filter otentikasi
$routes->get('/register', 'Auth::register');
$routes->post('/register/store', 'Auth::store');
$routes->get('/login', 'Auth::login');
$routes->post('/login/auth', 'Auth::loginAuth');
$routes->get('/logout', 'Auth::logout');

// Grup rute yang dilindungi oleh filter 'auth'
// Semua rute di dalam grup ini hanya bisa diakses oleh pengguna yang sudah login
$routes->group('/', ['filter' => 'auth'], function ($routes) {
  // Rute default setelah login, mengarahkan ke daftar kontak

  // Menampilkan form untuk menambah kontak baru
  $routes->get('create', 'Kontak::create');

  // Menyimpan data kontak baru yang dikirim dari form
  $routes->post('store', 'Kontak::store');

  // Menampilkan form untuk mengedit kontak berdasarkan ID
  $routes->get('edit/(:num)', 'Kontak::edit/$1');

  // Memproses pembaruan data yang dikirim dari form edit
  $routes->post('update/(:num)', 'Kontak::update/$1');

  // Menghapus data kontak berdasarkan ID
  $routes->post('delete/(:num)', 'Kontak::delete/$1');
});
