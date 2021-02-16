<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table='pendaftarans';
    protected $fillable=['no_pendaftaran','tanggal','waktu','norm','usia_tahun','usia_hari','usia_bulan','poli','cara_daftar','status','idpasien','noantrian','nokwitansi','deskripsi'];
    
}
