<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table='profiles';

    protected $fillable=['id_puskesmas','kode_puskesmas','nama_puskesmas','alamat','rt','rw','kelurahan','kecamatan','kota_kab','provinsi','pos','telp','email','no_ijin','tanggal','no_register','nip_kapus','nip_katu','logo'];
}
