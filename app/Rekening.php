<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    protected $table='rekenings';

    protected $fillable=['kode_rekening','nama_rekening','jenis','biaya','status','deskripsi'];
    

}
