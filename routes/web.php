<?php

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

Route::resource('pasien', 'PasienController');
Route::resource('wilayah', 'WilayahController');

Route::get('wilayah-fetch', 'WilayahController@fetch');


Route::get('/', function () {
    return view('layouts.main');
});

Route::resource('poli', 'PoliController');
Route::resource('item', 'ItemController');
Route::post('fetchitem','ItemController@fetch')->name('fetchitem');

Route::resource('poli', 'PoliController');

// billing
Route::get('billing','BillingController@index');


Route::get('/helper-kustom',function(){
    return KustomHelper::getItem('Jenis-Kelamin');  
});

// pendaftaran 
Route::resource('pendaftaran', 'PendaftaranController');