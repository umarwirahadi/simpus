<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Codeicd extends Model
{
    protected $table='icd10';
    protected $fillable=['id_icd','id_icd2','chapter','section','descriptions','gender','agegroup','alert'];
}
