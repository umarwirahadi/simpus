<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tenagamedis extends Model
{
    protected $table='tenagamedis';
    protected $fillable=['nip','nama_lengkap','jenistenagamedis','bidang_pelayanan','hp','alamat','tgl_lahir','tgl_gabung','no_ijin','status','keterangan','kdDokter_pcare','nmDokter_pcare'];
 public static function boot(){
        parent::boot();
        static::creating(function($penerimaanObat){
            $penerimaanObat->id_petugas=Auth::user()->id;
        });
    }    
}
