<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table='pasiens';
    protected $fillable=['nik',	'no_kk',	'status_hubungan',	'no_bpjs',	'no_rm',	'no_rm_lama',	'nama_lengkap',	'jenis_kelamin',	'tempat_lahir',	'tanggal_lahir',	'agama',	'gol_darah',	'hp',	'telp',	'email',	'warganegara',	'alamat',	'rt',	'rw',	'kelurahan',	'kecamata',	'kab_kota',	'provinsi',	'pos',	'status_marital',	'pendidikan_terakhir',	'suku',	'pekerjaan',	'penanggung_jawab',	'nama_ayah',	'nama_ibu',	'hubungan_dengan_penanggung_jawab',	'status_pasien'];
    
}
