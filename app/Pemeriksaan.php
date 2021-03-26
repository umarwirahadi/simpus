<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    protected $table='pemeriksaans';
    protected $fillable=['idpasien','id_pendaftaran','tanggal','jam','kuningan','kasus','sistol','diastol','tekanan_nadi','respirasi','suhu','berat_badan','tinggi_badan','keluhan_utama','pemeriksaan_fisik','anamnesa','terapi','diagnosa','keterangan','id_petugas','status'];
}
