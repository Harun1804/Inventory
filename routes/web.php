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
    Route::get('/pg/barang_masuk','BarangController@barangMasuk')->name('pg.bm.index');
    Route::get('/pg/barang_masuk/{id}','BarangController@rak')->name('pg.bm.rak');
    Route::put('/pg/barang_masuk/{id}/update','BarangController@inputRak')->name('pg.bm.rak.input');
    //Barang Keluar
    Route::get('/pg/barang_keluar', 'BarangController@barangKeluar')->name('pg.bk.index');
    Route::get('/pg/barang_keluar/{id}', 'BarangController@detailBarangKeluar')->name('pg.bk.detail');
    Route::get('/pg/barang_keluar/{id}/kirim', 'BarangController@kirim')->name('pg.bk.kirim');
    //Barang Request
    Route::get('/pg/barang_request','BarangController@barangRequest')->name('pg.br.index');
    Route::get('/pg/barang_request/create', 'BarangController@membuatRequest')->name('pg.br.create');
    Route::get('/pg/barang_request/{id}/delete', 'BarangController@hapusRequest')->name('pg.br.delete');
    Route::get('pg/barang_request/produk/{id}', 'BarangController@tambahProduk')->name('pg.br.produk.index');
    Route::post('pg/barang_request/produk/create', 'BarangController@tambahProdukBaru')->name('pg.br.produk.create');
});
