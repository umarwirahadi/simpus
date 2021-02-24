<?php

Route::resource('profile', 'ProfileController');
Route::resource('pasien', 'PasienController');
Route::get('pasien_server_side','PasienController@fetch')->name('data.pasien');
Route::get('cari_pasien','PasienController@finddata')->name('cari.pasien');
Route::get('cari_pasienbynik','PasienController@finddatanik')->name('cari.pasienbynik');


Route::resource('wilayah', 'WilayahController');
Route::get('wilayah_server_side','WilayahController@fetch')->name('data.wilayah');
Route::get('cari_wilayah','WilayahController@finddata')->name('cari.wilayah');


// Route::get('wilayah-fetch', 'WilayahController@fetch');




// Route::post('wilayah/datatable','WilayahController@fetch')->name('wilayah.datatable');


Route::get('/', function () {
    return view('layouts.main');
});

Route::resource('poli', 'PoliController');
Route::resource('item', 'ItemController');
Route::resource('rekening', 'RekeningController');
Route::post('fetchitem','ItemController@fetch')->name('fetchitem');

Route::resource('poli', 'PoliController');

// billing
Route::get('billing','BillingController@index');


Route::get('/helper-kustom',function(){
    return KustomHelper::getItem('Jenis-Kelamin');  
});



// pendaftaran 
Route::resource('pendaftaran', 'PendaftaranController');
Route::get('fetchpendaftaranbydate','PendaftaranController@fetchToday');


// pemeriksaan
Route::resource('pemeriksaan', 'PemeriksaanController');