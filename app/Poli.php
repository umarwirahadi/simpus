<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $table='polis';
    protected $fillable=['kode','poli','status','tanggal_aktif','deskripsi'];

}
