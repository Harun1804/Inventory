<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth
Route::get('/', 'AuthController@login')->name('login');
Route::post('/validasi', 'AuthController@validasi')->name('validasi');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    //User
    Route::get('/user', 'UserController@index')->name('dashboard');

    //Cek Barang
    Route::get('/pg/cek_barang', 'BarangController@cekBarang')->name('pg.cb.index');
    //Barang Masuk
    Route::get('/pg/barang_masuk', 'BarangController@barangMasuk')->name('pg.bm.index');
    Route::get('/pg/barang_masuk/{id}', 'BarangController@rak')->name('pg.bm.rak');
    Route::put('/pg/barang_masuk/{id}/update', 'BarangController@inputRak')->name('pg.bm.rak.input');
    //Barang Keluar
    Route::get('/pg/barang_keluar', 'BarangController@barangKeluar')->name('pg.bk.index');
    Route::get('/pg/barang_keluar/{id}', 'BarangController@detailBarangKeluar')->name('pg.bk.detail');
    Route::get('/pg/barang_keluar/{id}/kirim', 'BarangController@kirim')->name('pg.bk.kirim');
    //Barang Request
    Route::get('/pg/barang_request', 'BarangController@barangRequest')->name('pg.br.index');
    Route::get('/pg/barang_request/create', 'BarangController@membuatRequest')->name('pg.br.create');
    Route::get('/pg/barang_request/{id}/delete', 'BarangController@hapusRequest')->name('pg.br.delete');
    Route::get('pg/barang_request/produk/{id}', 'BarangController@tambahProduk')->name('pg.br.produk.index');
    Route::post('pg/barang_request/produk/create', 'BarangController@tambahProdukBaru')->name('pg.br.produk.create');

    //supplier
    Route::get('/admin/supplier', 'SupplierController@index')->name('admin.supplier.index');
    Route::post('/admin/supplier/create', 'SupplierController@create')->name('admin.supplier.create');
    Route::get('/admin/supplier/{id}/edit', 'SupplierController@edit')->name('admin.supplier.edit');
    Route::put('/admin/supplier/{id}/update', 'SupplierController@update')->name('admin.supplier.update');
    Route::get('/admin/supplier/{id}/delete', 'SupplierController@delete')->name('admin.supplier.delete');
    //kategori
    Route::get('/admin/kategori', 'kategoriController@index')->name('admin.kategori.index');
    Route::post('/admin/kategori/create', 'kategoriController@create')->name('admin.kategori.create');
    Route::get('/admin/kategori/{id}/edit', 'kategoriController@edit')->name('admin.kategori.edit');
    Route::put('/admin/kategori/{id}/update', 'kategoriController@update')->name('admin.kategori.update');
    Route::get('/admin/kategori/{id}/delete', 'kategoriController@delete')->name('admin.kategori.delete');
    //permintaan
    Route::get('/admin/barang_request/', 'PermintaanController@index')->name('admin.br.index');
    Route::get('/admin/barang_request/{id}', 'PermintaanController@detailPermintaan')->name('admin.br.detail');
    //pemesanan
    Route::get('/admin/pemesanan', 'PermintaanController@pemesanan')->name('admin.pemesanan.index');
    Route::post('/admin/pemesanan/create', 'PermintaanController@buatpemesanan')->name('admin.pemesanan.create');
    Route::get('/admin/pemesanan/produk/{id}/{user_id}', 'PermintaanController@produk')->name('admin.pemesanan.produk');
    Route::post('admin/pemesanan/produk/create', 'PermintaanController@tambahProduk')->name('admin.pemesanan.produk.create');
    Route::get('/admin/pemesanan/{id}/delete', 'PermintaanController@hapuspemesanan')->name('admin.pemesanan.delete');

    //pesanan
    Route::get('/supplier/pesanan', 'PesananController@index')->name('supplier.pesanan.index');
    Route::get('/supplier/pesanan/{id}', 'PesananController@detailPesanan')->name('supplier.pesanan.detail');
    Route::post('/supplier/pesanan/kirim', 'PesananController@kirimBarang')->name('supplier.pesanan.kirim');
    Route::put('/supplier/pesanan/{id}/persetujuan', 'PesananController@approve')->name('supplier.pesanan.persetujuan');
    //produk
    Route::get('/supplier/produk', 'ProdukController@index')->name('supplier.produk.index');
    Route::post('/supplier/produk/create', 'ProdukController@create')->name('supplier.produk.create');
    Route::get('/supplier/produk/{id}/edit', 'ProdukController@edit')->name('supplier.produk.edit');
    Route::put('/supplier/produk/{id}/update', 'ProdukController@update')->name('supplier.produk.update');
    Route::get('/supplier/produk/{id}/delete', 'ProdukController@delete')->name('supplier.produk.delete');
});
