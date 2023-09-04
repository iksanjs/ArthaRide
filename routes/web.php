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
    Route::put('/{id_sppk}/reject', 'SPPKController@rejected')->name('sppk.rejected');
});

Route::prefix('kontraksewa')->group(function () {
    Route::get('/', 'KontrakSewaController@index')->name('kontraksewa.index');
    Route::get('/create', 'KontrakSewaController@create')->name('kontraksewa.create');
    Route::put('/{id_kontraksewa}/approve', 'KontrakSewaController@approved')->name('kontraksewa.approved');
    Route::put('/{id_kontraksewa}/reject', 'KontrakSewaController@rejected')->name('kontraksewa.rejected');
});

Route::prefix('stwahanatocabang')->group(function () {
    Route::get('/', 'STWahanatoCabangController@index')->name('stwahanatocabang.index');
    Route::get('/create', 'STWahanatoCabangController@create')->name('stwahanatocabang.create');
    Route::put('/{id_stwahanatocabang}/approve', 'STWahanatoCabangController@approved')->name('stwahanatocabang.approved');
    Route::put('/{id_stwahanatocabang}/reject', 'STWahanatoCabangController@rejected')->name('stwahanatocabang.rejected');
});

Route::prefix('pengembalian')->group(function () {
    Route::get('/', 'PengembalianController@index')->name('pengembalian.index');
    Route::get('/create', 'PengembalianController@create')->name('pengembalian.create');
});

Route::prefix('bengkel')->group(function () {
    Route::get('/', 'BengkelController@index')->name('bengkel.index');
    Route::put('/{id_bengkel}/approve', 'BengkelController@approved')->name('bengkel.approved');
});

Route::prefix('service')->group(function () {
    Route::get('/', 'ServiceController@index')->name('service.index');
    Route::put('/{id_service}/approve', 'ServiceController@approved')->name('service.approved');
});

Route::get('/', 'AuthController@login')->name('login');
Route::get('/register', 'AuthController@register')->name('register');
Route::post('logout', 'AuthController@logout')->name('logout');
Route::post('/postregister', 'AuthController@postregister')->name('auth.postregister');;
Route::post('/postlogin', 'AuthController@postlogin')->name('auth.postlogin');
Route::get('/dashboard', 'AuthController@dashboard')->name('dashboard');



Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::resource('/kendaraan', 'KendaraanController');
Route::resource('/penggantian', 'PenggantianController');
Route::resource('/pengembalian', 'PengembalianController');
Route::resource('/stwahanatocabang', 'STWahanatoCabangController');
Route::resource('/kontraksewa', 'KontrakSewaController');
Route::resource('/sppk', 'SPPKController');
Route::resource('/pengajuanpembelian', 'PengajuanPembelianController');
Route::resource('/transaksipembelian', 'TransaksiPembelianController');
Route::resource('/stdealertowahana', 'STDealertoWahanaController');
Route::resource('/bengkel', 'BengkelController');
Route::resource('/service', 'ServiceController');