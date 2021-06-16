<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('halutama');




/*master*/

    /*Profile*/
        Route::resource('puskesmas', 'ProfileController')->middleware('role:admin');

    /*ICD 10*/
        Route::resource('icd','CodeicdController');
        Route::get('fetchicd10','CodeicdController@fetch');
        Route::get('exporticd','CodeicdController@export')->name('icd.export');

    /*Faskes/provider*/
        Route::resource('faskes','ProviderbpjsController');

    /*wilayah*/
        Route::resource('wilayah', 'WilayahController');
        Route::get('wilayah_server_side','WilayahController@fetch')->name('data.wilayah');
        Route::get('cari_wilayah','WilayahController@finddata')->name('cari.wilayah');
        Route::get('exportwilayah','WilayahController@export')->name('wilayah.export');

    /*item*/
        Route::resource('item', 'ItemController');
        Route::get('getallitempcare','ItemController@getdatapcare')->name('get.item.pcare');
        Route::post('fetchitem','ItemController@fetch')->name('fetchitem');

/*end master*/


/*menu data*/

    /*data pasien*/
        Route::resource('pasien', 'PasienController');
        Route::get('pasien_server_side','PasienController@fetch')->name('data.pasien');
        Route::get('cari_pasien','PasienController@finddata')->name('cari.pasien');
        Route::post('cari_pasien_bpjs','PasienController@specifiedbyidbpjs')->name('cari.pasienbpjs');
        Route::get('cari_pasienbynik','PasienController@finddatanik')->name('cari.pasienbynik');
        Route::post('caribpjs','PasienController@findatabpjs')->name('cari.pasienbpjs');
        Route::get('barcode-pasien','PasienController@barcode')->name('pasien.barcode');
        Route::get('cetak-kib-pasien','PasienController@printkib')->name('pasien.printkib');
        Route::get('export-pasien','PasienController@export')->name('pasien.export');


    /*data tenaga medis*/
        Route::resource('tenagamedis','TenagamedisController');
        Route::get('getTenagaMedis','TenagamedisController@getTenagaMedisPcare')->name('tenagamedis.getpcare');

    /*data obat*/
        Route::resource('obat','ObatController');
        Route::get('fetchObat','ObatController@fetch');

    /*penerimaan obat*/
        Route::get('penerimaanObat/{id}','PenerimaanobatController@index')->name('penerimaanobat.index');
        Route::post('penerimaanObat','PenerimaanobatController@store')->name('penerimaanobat.store');
        Route::get('penerimaanObat/{id}/edit','PenerimaanobatController@edit')->name('penerimaanobat.edit');
        Route::put('penerimaanObat/{penerimaanObat}','PenerimaanobatController@update')->name('penerimaanobat.update');
        Route::delete('penerimaanObat/{id}','PenerimaanobatController@destroy')->name('penerimaanobat.destroy');
        Route::get('fetchpenerimaan','PenerimaanobatController@fetch');
        Route::post('printpenerimaan','PenerimaanobatController@printpenerimaan')->name('penerimaanobat.print');
        Route::post('printpenerimaanall','PenerimaanobatController@printpenerimaanAll')->name('penerimaanobat.printall');
    /*data poli*/
        Route::resource('poli', 'PoliController');
        Route::post('get-poli-pcare','PoliController@getpoli')->name('get.poli.pcare');

    /*data rekening*/
        Route::resource('rekening', 'RekeningController');

/*end menu data*/



/*menu transaksi*/

    /*Pendaftaran*/
        Route::resource('pendaftaran', 'PendaftaranController');
        Route::get('fetchpendaftaranbydate','PendaftaranController@fetchToday');
        Route::get('pendaftaran-export','PendaftaranController@export')->name('pendaftaran.export');
        Route::post('kajianawalpemeriksaan','PendaftaranController@kajianawal')->name('pendaftaran.kajianawal');
        Route::post('createkajianaawal','PendaftaranController@proseskajian')->name('pendaftaran.proseskajianawal');
        Route::post('sending-pcare','PendaftaranController@sendPcare')->name('pendaftaran.sendpcare');
        Route::post('delete-pcare-daftar','PendaftaranController@deletependaftaranpcare')->name('pendaftaran.deletepcare');
        Route::post('cekstatusBPJS','PendaftaranController@cekstatusBPJS')->name('pendaftaran.cekstatusBPJS');


    /*billing*/
        Route::get('billing','BillingController@index');

    /*farmasi*/
        Route::get('farmasi/create/{id_pememriksaan}','FarmasiController@create')->name('farmasi.create');
        Route::resource('farmasi','FarmasiController');
        Route::get('fetchfarmasi','FarmasiController@fetch');


    /*pemeriksaan*/
        Route::resource('pemeriksaan', 'PemeriksaanController');
        Route::get('prosespemeriksaan/{id}', 'PemeriksaanController@proses')->name('pemeriksaan.proses');
        Route::get('fetchpemeriksaan','PemeriksaanController@fetchToday');
        Route::post('setcookiespoli','PemeriksaanController@setpoli')->name('set.poli');

    /*rekam medis*/
        /*monitoring rekam medis*/
            Route::get('monitoringberkas','MonitoringController@index')->name('monitoring.berkasrm');
            Route::get('fetchmonitoringrekammedis','MonitoringController@fetch')->name('monitoring.fetchrm');
            Route::get('cetak-kib','MonitoringController@printkib')->name('monitoring.printpopupkib');

// Route::get('/', 'HomeController@index')->name('home');


Route::resource('settingpcare','PcaresettingController');
Route::resource('listpcare','PcareurlController');
