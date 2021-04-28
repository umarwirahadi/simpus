<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pcareurl extends Model
{
    protected $table='pcareurls';
    protected $fillable=['endpoint','domain','method','description','status','id_user'];
    
}
