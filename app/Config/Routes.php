<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Login\LoginController::index');

// Login
$routes->get('login', 'Login\LoginController::index');
$routes->post('login', 'Login\LoginController::processLogin');


//Logout 
$routes->get('logout', 'Login\LoginController::logout');


// Setelah login akan diarahkan sesuai role pengguna
// Ke Halaman Admin
$routes->get('admin/dashboard', 'Admin\AdminDashboardController::index', ['filter' => 'auth']);

// Gudang Admin
$routes->group('admin/gudang', ['filter' => 'auth'], function ($routes) {
    // Halaman Admin Gudang
    $routes->get('list', 'Admin\AdminGudangController::index');

    // Pagination Admin Gudang
    $routes->get('list/(:num)', 'Admin\AdminGudangController::index/$1');

    // Halaman Create untuk Tambah Data Gudang
    $routes->get('create', 'Admin\AdminGudangController::create');

    // Proses Tambah Data Gudang
    $routes->post('create', 'Admin\AdminGudangController::tambah');

    // Halaman Edit Gudang
    $routes->get('edit/(:num)', 'Admin\AdminGudangController::edit/$1');

    // Update Data Gudang
    $routes->post('update/(:num)', 'Admin\AdminGudangController::update/$1');

    // Halaman Konfirmasi Hapus Data Gudang
    $routes->get('konfirmasi/(:num)', 'Admin\AdminGudangController::konfirmasi/$1');

    // Delete Data Gudang
    $routes->match(['get', 'post'], 'delete/(:num)', 'Admin\AdminGudangController::delete/$1');
});

// Barang Admin
$routes->group('admin/barang', ['filter' => 'auth'], function ($routes) {
    // Halaman Admin Barang
    $routes->get('list', 'Admin\AdminBarangController::index');

    // Halaman Admin Tambah Data Barang
    $routes->get('create', 'Admin\AdminBarangController::create');

    //Proses Tambah Data Barang
    $routes->post('create', 'Admin\AdminBarangController::tambah');

    //Proses Tambah Data Barang
    $routes->get('edit/(:num)', 'Admin\AdminBarangController::edit/$1');

    // Update Data Barang
    $routes->post('update/(:num)', 'Admin\AdminBarangController::update/$1');

    // Halaman Konfirmasi Hapus Data Barang
    $routes->get('konfirmasi/(:num)', 'Admin\AdminBarangController::konfirmasi/$1');

    // Delete Data Barang
    $routes->match(['get', 'post'], 'delete/(:num)', 'Admin\AdminBarangController::delete/$1');
});


// Ruangan Admin
$routes->group('admin/ruangan', ['filter' => 'auth'], function ($routes) {
    // Halaman Admin Ruangan
    $routes->get('list', 'Admin\AdminRuanganController::index');

    // Untuk Show Template
    $routes->get('template', 'Admin\AdminRuanganController::showTemplate');

    // Menampilkan Halaman Tambah Ruangan
    $routes->get('create', 'Admin\AdminRuanganController::create');

    // Proses Tambah Data Ruangan
    $routes->post('create', 'Admin\AdminRuanganController::tambah');

    // Untuk Melihat Ruangan Yang Baru Dibuat
    $routes->get('(:segment)', 'Admin\AdminRuanganController::lihatRuangan/$1');

    // Untuk Ke Halaman Konfirmasi Hapus
    $routes->get('konfirmasi/(:num)', 'Admin\AdminRuanganController::konfirmasi/$1');

    // Delete Data RUangan
    $routes->match(['get', 'post'], 'delete/(:num)', 'Admin\AdminRuanganController::delete/$1');
});

// Fasilitas Admin
$routes->group('admin/fasilitas', ['filter' => 'auth'], function ($routes) {
    // Halaman Admin Fasilitas
    $routes->get('list', 'Admin\AdminFasilitasController::index');

    // Pagination Admin Fasilitas
    $routes->get('list/(:num)', 'Admin\AdminFasilitasController::index/$1');

    // Halaman Admin Tambah Data Fasilitas
    $routes->get('create', 'Admin\AdminFasilitasController::create');

    // Proses Tambah Data Fasilitas
    $routes->post('create', 'Admin\AdminFasilitasController::tambah');

    // Halaman Edit Fasilitas
    $routes->get('edit/(:num)', 'Admin\AdminFasilitasController::edit/$1');

    // Update Data Fasilitas
    $routes->post('update/(:num)', 'Admin\AdminFasilitasController::update/$1');

    // Halaman Konfirmasi Hapus Fasilitas
    $routes->get('konfirmasi/(:num)', 'Admin\AdminFasilitasController::konfirmasi/$1');

    // Delete Data Fasilitas
    $routes->match(['get', 'post'], 'delete/(:num)', 'Admin\AdminFasilitasController::delete/$1');
});

// Barang Masuk Admin
$routes->group('admin/barang-masuk', ['filter' => 'auth'], function ($routes) {
    // Halaman Admin Barang Masuk
    $routes->get('list', 'Admin\AdminBarangMasukController::index');

    // Pagination Admin Barang Masuk
    $routes->get('list/(:num)', 'Admin\AdminBarangMasukController::index/$1');

    // Halaman Admin Tambah Data Barang Masuk
    $routes->get('create', 'Admin\AdminBarangMasukController::create');

    // Proses Tambah Data Barang Masuk
    $routes->post('create', 'Admin\AdminBarangMasukController::tambah');

    // Halaman Edit Barang Masuk
    $routes->get('edit/(:num)', 'Admin\AdminBarangMasukController::edit/$1');

    // Update Data Barang Masuk
    $routes->post('update/(:num)', 'Admin\AdminBarangMasukController::update/$1');

    // Halaman Konfirmasi Hapus Barang Masuk
    $routes->get('konfirmasi/(:num)', 'Admin\AdminBarangMasukController::konfirmasi/$1');

    // Delete Data Barang Masuk
    $routes->match(['get', 'post'], 'delete/(:num)', 'Admin\AdminBarangMasukController::delete/$1');
});

// Barang Keluar Admin
$routes->group('admin/barang-keluar', ['filter' => 'auth'], function ($routes) {
    // Halaman Admin Barang Keluar
    $routes->get('list', 'Admin\AdminBarangKeluarController::index');

    // Pagination Admin Barang Keluar
    $routes->get('list/(:num)', 'Admin\AdminBarangKeluarController::index/$1');

    // Halaman Admin Tambah Data Barang Keluar
    $routes->get('create', 'Admin\AdminBarangKeluarController::create');

    // Proses Tambah Data Barang Keluar
    $routes->post('create', 'Admin\AdminBarangKeluarController::tambah');

    // Halaman Konfirmasi Hapus Barang Keluar
    $routes->get('konfirmasi/(:num)', 'Admin\AdminBarangKeluarController::konfirmasi/$1');

    // Delete Data Barang Keluar
    $routes->match(['get', 'post'], 'delete/(:num)', 'Admin\AdminBarangKeluarController::delete/$1');

    // Route untuk mendapatkan barang berdasarkan ruangan
    $routes->get('getBarangByRuangan/(:any)', 'Admin\AdminBarangKeluarController::getBarangByRuangan/$1');

    // Route untuk mendapatkan kode barang berdasarkan nama barang
    $routes->get('getBarangByNama/(:any)', 'Admin\AdminBarangKeluarController::getBarangByNama/$1');
});

// Suplier Admin
$routes->group('admin/suplier', ['filter' => 'auth'], function ($routes) {
    // Halaman Admin Suplier
    $routes->get('list', 'Admin\AdminSuplierController::index');

    // Pagination Admin Suplier
    $routes->get('list/(:num)', 'Admin\AdminSuplierController::index/$1');

    // Halaman Admin Tambah Data Suplier
    $routes->get('create', 'Admin\AdminSuplierController::create');

    // Proses Tambah Data Suplier
    $routes->post('create', 'Admin\AdminSuplierController::tambah');

    // Halaman Edit Suplier
    $routes->get('edit/(:num)', 'Admin\AdminSuplierController::edit/$1');

    // Update Data Suplier
    $routes->post('update/(:num)', 'Admin\AdminSuplierController::update/$1');

    // Halaman Konfirmasi Hapus Suplier
    $routes->get('konfirmasi/(:num)', 'Admin\AdminSuplierController::konfirmasi/$1');

    // Delete Data Suplier
    $routes->match(['get', 'post'], 'delete/(:num)', 'Admin\AdminSuplierController::delete/$1');
});

// Pengguna Admin
$routes->group('admin/pengguna', ['filter' => 'auth'], function ($routes) {
    // Halaman Admin Pengguna
    $routes->get('list', 'Admin\AdminPenggunaController::index');

    // Pagination Admin Pengguna
    $routes->get('list/(:num)', 'Admin\AdminPenggunaController::index/$1');

    // Halaman Admin Tambah Data Pengguna
    $routes->get('create', 'Admin\AdminPenggunaController::create');

    // Proses Tambah Data Pengguna
    $routes->post('create', 'Admin\AdminPenggunaController::tambah');

    // Halaman Edit Pengguna
    $routes->get('edit/(:num)', 'Admin\AdminPenggunaController::edit/$1');

    // Update Data Pengguna
    $routes->post('update/(:num)', 'Admin\AdminPenggunaController::update/$1');

    // Halaman Konfirmasi Hapus Pengguna
    $routes->get('konfirmasi/(:num)', 'Admin\AdminPenggunaController::konfirmasi/$1');

    // Delete Data Pengguna
    $routes->match(['get', 'post'], 'delete/(:num)', 'Admin\AdminPenggunaController::delete/$1');
});


// Profil Admin
$routes->group('admin/pengguna', ['filter' => 'auth'], function ($routes) {
    // Halaman Admin Profil
    $routes->get('profil', 'Admin\AdminPenggunaController::profil');

    // Update Data Profil
    $routes->post('updateProfil', 'Admin\AdminPenggunaController::updateProfil');
});


// Ke Halaman User
$routes->get('user/dashboard', 'User\UserDashboardController::index', ['filter' => 'auth']);

// Gudang User
$routes->group('user/gudang', ['filter' => 'auth'], function ($routes) {
    // Halaman User Gudang
    $routes->get('list', 'User\UserGudangController::index');
});

// Barang User
$routes->group('user/barang', ['filter' => 'auth'], function ($routes) {
    // Halaman User Barang
    $routes->get('list', 'User\UserBarangController::index');
});


// Ruangan User
$routes->group('user/ruangan', ['filter' => 'auth'], function ($routes) {
    // Halaman User Ruangan
    $routes->get('list', 'User\UserRuanganController::index');

    // Untuk Show Template
    $routes->get('template', 'User\UserRuanganController::showTemplate');

    // Untuk Melihat Ruangan Yang Baru Dibuat
    $routes->get('(:segment)', 'User\UserRuanganController::lihatRuangan/$1');
});

// Fasilitas User
$routes->group('user/fasilitas', ['filter' => 'auth'], function ($routes) {
    // Halaman User Fasilitas
    $routes->get('list', 'User\UserFasilitasController::index');
});

// Barang Masuk User
$routes->group('user/barang-masuk', ['filter' => 'auth'], function ($routes) {
    // Halaman User Barang Masuk
    $routes->get('list', 'User\UserBarangMasukController::index');
});

// Barang Keluar User
$routes->group('user/barang-keluar', ['filter' => 'auth'], function ($routes) {
    // Halaman User Barang Keluar
    $routes->get('list', 'User\UserBarangKeluarController::index');
});

// Suplier User
$routes->group('user/suplier', ['filter' => 'auth'], function ($routes) {
    // Halaman User Suplier
    $routes->get('list', 'User\UserSuplierController::index');
});

// Pengguna User
$routes->group('user/pengguna', ['filter' => 'auth'], function ($routes) {
    // Halaman User Pengguna
    $routes->get('list', 'User\UserPenggunaController::index');
});

// Profil User
$routes->group('user/pengguna', ['filter' => 'auth'], function ($routes) {
    // Halaman User Profil
    $routes->get('profil', 'User\UserPenggunaController::profil');

    // Update Data Profil
    $routes->post('updateProfil', 'User\UserPenggunaController::updateProfil');
});
