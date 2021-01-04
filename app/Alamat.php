<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $table='alamats';
    protected $fillable=['kel','kec','jenis','kotakab','prov','pos','status'];


}
