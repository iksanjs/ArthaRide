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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/sppk/store', 'SPPKController@store')->name('sppk.store');
Route::get('/sppk/{id_sppk}/edit', 'SPPKController@edit')->name('sppk.edit');


Route::resource('/sppk', 'SPPKController');
Route::resource('/pengajuanpembelian', 'PengajuanPembelianController');
Route::resource('/transaksipembelian', 'TransaksiPembelianController');
Route::resource('/stdealertowahana', 'STDealertoWahanaController');