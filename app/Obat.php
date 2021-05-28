<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Obat extends Model
{
    protected $table='obats';
    protected $fillable=['kode','nama_obat','jenis','satuan','harga','stok_awal','sisa_stok','keterangan','status','id_petugas'];
    
     public static function boot(){
        parent::boot();
        static::creating(function($obat){
            $obat->id_petugas=Auth::user()->id;
        });
    }
}
