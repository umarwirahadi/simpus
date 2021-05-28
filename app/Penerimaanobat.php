<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Penerimaanobat extends Model
{
    protected $table='penerimaanobats';
    protected $fillable=['id_obat','satuan','jumlah_penermaan','tanggal_penermaan','tanggal_kadaluarsa','waktu_penermaan','no_batch','petugas_pengirim','id_petugas','keterangan','status'];

    public static function boot(){
        parent::boot();
        static::creating(function($penerimaanObat){
            $penerimaanObat->id_petugas=Auth::user()->id;
        });
    }
   
}
