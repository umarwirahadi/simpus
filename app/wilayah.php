<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table='wilayahs';
    protected $fillable=['kel','kec','jenis','kotakab','prov','pos'];

}
