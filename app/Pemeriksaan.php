<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pemeriksaan extends Model
{
    protected $table='pemeriksaans';
    protected $fillable=['idpasien',	'id_pendaftaran',	'pcare_no_kunjungan',	'tanggal',	'jam',	'kunjungan',	'kasus',	'sistole',	'diastole',	'tekanan_nadi',	'respirasi',	'suhu',	'berat_badan',	'tinggi_badan',	'keluhan_utama',	'pemeriksaan_fisik',	'anamnesa',	'terapi',	'diagnosa',	'resep_obat',	'id_petugas',	'status',	'pcare_kdsadar',	'pcare_kd_status_pulang',	'pcare_tgl_pulang',	'pcare_kddokter',	'pcare_kddiag1',	'pcare_kddiag2',	'pcare_kddiag3',	'pcare_kd_poli_rujukInternal',	'pcare_rujuk_lanjut',	'pcare_kdtacc',	'pcare_alasantacc'];
    
    public static function boot(){
        parent::boot();
        static::creating(function($pemeriksaan){
            $pemeriksaan->id_petugas=Auth::user()->id;
        });
    }
    
}
