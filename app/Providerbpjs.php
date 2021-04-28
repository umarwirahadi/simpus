<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Providerbpjs extends Model
{
    protected $table='providerbpjs';
    protected $fillable=['kdProvider','nmProvider'];
    
    public function Pasien()
    {
        return $this->belongsTo('App\Pasien');
    }
    
}
