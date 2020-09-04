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
Route::get('/', 'AuthController@index')->name('login');
Route::post('/validasi', 'AuthController@validasi')->name('validasi');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    //all user
    //Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    //Permintaan
    Route::get('/permintaan', 'Barang\RequestController@index')->name('permintaan.index');
    Route::get('/permintaan/{id}', 'Barang\RequestController@show')->name('permintaan.detail');

    //admin
    //user
    Route::resource('/admin/user', 'Admin\UserController');
    //Kategori
    Route::resource('/admin/kategori', 'Admin\kategoriController');
    //Produk
    Route::resource('/admin/produk', 'Admin\ProdukController');

    //Petugas Gudang
    //Cek Barang
    Route::get('/petugas/cekBarang', 'Barang\BarangController@cekBarang')->name('barang.cek');
    //barang masuk
    Route::get('/petugas/barang/masuk', 'Barang\BarangController@barangMasuk')->name('barang.masuk');
    Route::get('/petugas/barang/masuk/invoice', 'Barang\BarangController@cetakInvoice')->name('barang.masuk.invoice');
    Route::get('/petugas/barang/masuk/{id}', 'Barang\BarangController@rak')->name('barang.masuk.rak');
    Route::put('/petugas/barang/masuk/{id}', 'Barang\BarangController@updateRak')->name('barang.masuk.rak.update');
    //Permintaan
    Route::get('/petugas/permintaan', 'Barang\RequestController@index')->name('barang.index');
    Route::get('/petugas/permintaan/create', 'Barang\RequestController@create')->name('barang.create');
    Route::get('/petugas/permintaan/{id}', 'Barang\RequestController@show')->name('barang.detail');
    Route::post('petugas/permintaan/detail/create', 'Barang\RequestController@createDetail')->name('barang.detail.create');
    Route::get('/petugas/permintaan/detail/{id}', 'Barang\RequestController@editDetail')->name('barang.detail.edit');
    Route::put('/petugas/permintaan/detail/{id}/update', 'Barang\RequestController@updateDetail')->name('barang.detail.update');
    Route::get('/petugas/permintaan/detail/{id}/delete', 'Barang\RequestController@deleteDetail')->name('barang.detail.delete');
    Route::get('/petugas/permintaan/{id}/delete', 'Barang\RequestController@destroy')->name('barang.delete');

    //Purchasing
    //Permintaan
    Route::put('/pc/permintaan/{id}/persetujuan', 'Barang\RequestController@persetujuan')->name('permintaan.persetujuan');
    Route::put('/pc/permintaan/{id}/kirim', 'Barang\RequestController@kirim')->name('permintaan.kirim');
    Route::get('/pc/permintaan/{id}/cetak', 'Barang\RequestController@cetakfaktur')->name('permintaan.cetak');
    //Supplier
    Route::resource('/pc/supplier', 'SupplierController');

    //pemilik
    //laporan
    Route::get('/pemilik/laporan', 'PemilikController@index')->name('pemilik.laporan');
    Route::get('/pemilik/laporan/semua', 'PemilikController@semua')->name('pemilik.laporan.semua');
    Route::get('/pemilik/laporan/cetak', 'PemilikController@cetakSemua')->name('pemilik.laporan.cetak');
    Route::post('/pemilik/laporan/filter', 'PemilikController@filter')->name('pemilik.laporan.filter');
    Route::get('/pemilik/laporan/filter/keterangan/{keterangan}', 'PemilikController@cetakFilterKeterangan')->name('pemilik.laporan.cetak.filter.keterangan');
    Route::get('/pemilik/laporan/filter/{mulai}/{akhir}', 'PemilikController@cetakFilterTanggal')->name('pemilik.laporan.cetak.filter.tanggal');
    Route::get('/pemilik/laporan/filter/{id}', 'PemilikController@cetakFilterSupplier')->name('pemilik.laporan.cetak.filter.supplier');
});
