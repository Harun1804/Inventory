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
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

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
    //Permintaan
    Route::get('/petugas/permintaan', 'Barang\RequestController@index')->name('barang.index');
    Route::get('/petugas/permintaan/create', 'Barang\RequestController@create')->name('barang.create');
    Route::get('/petugas/permintaan/{id}', 'Barang\RequestController@show')->name('barang.detail');
    Route::post('petugas/permintaan/detail/create', 'Barang\RequestController@createDetail')->name('barang.detail.create');
    Route::get('/petugas/permintaan/detail/{id}', 'Barang\RequestController@editDetail')->name('barang.detail.edit');
    Route::put('/petugas/permintaan/detail/{id}/update', 'Barang\RequestController@updateDetail')->name('barang.detail.update');
    Route::get('/petugas/permintaan/detail/{id}/delete', 'Barang\RequestController@deleteDetail')->name('barang.detail.delete');
    Route::get('/petugas/permintaan/{id}/delete', 'Barang\RequestController@destroy')->name('barang.delete');
});
