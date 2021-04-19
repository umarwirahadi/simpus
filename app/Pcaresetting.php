<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pcaresetting extends Model
{
    protected $table='pcaresettings';
    protected $filable=['username_pcare','password_pcare','consumen_pcare','secretkey_pcare','timestamp_pcare','signature_pcare','authorization_pcare','aplicationcode_pcare','description','status','id_petugas'];
    
}
