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
});
