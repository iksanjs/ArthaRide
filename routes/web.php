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
// Route Pengajuan Pembelian
Route::prefix('sppk')->group(function () {
    Route::post('/store', 'SPPKController@store')->name('sppk.store');
    Route::get('/{id_sppk}/edit', 'SPPKController@edit')->name('sppk.edit');
    Route::get('/', 'SPPKController@index')->name('sppk.index');
    Route::put('/{id_sppk}/approve', 'SPPKController@approved')->name('sppk.approved');
});
Route::prefix('bengkel')->group(function () {
    Route::get('/', 'BengkelController@index')->name('bengkel.index');
});
Route::get('/', 'AuthController@login')->name('login');
Route::get('/register', 'AuthController@register')->name('register');
Route::post('logout', 'AuthController@logout')->name('logout');
Route::post('/postregister', 'AuthController@postregister')->name('auth.postregister');;
Route::post('/postlogin', 'AuthController@postlogin')->name('auth.postlogin');
Route::get('/dashboard', 'AuthController@dashboard')->name('dashboard');



Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::resource('/sppk', 'SPPKController');
Route::resource('/pengajuanpembelian', 'PengajuanPembelianController');
Route::resource('/transaksipembelian', 'TransaksiPembelianController');
Route::resource('/stdealertowahana', 'STDealertoWahanaController');
Route::resource('/bengkel', 'BengkelController');
Route::resource('/service', 'ServiceController');