<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table='pasiens';
    // protected $fillable=['nik',	'no_kk',	'status_hubungan',	'no_bpjs',	'no_rm',	'no_rm_lama',	'nama_lengkap',	'jenis_kelamin',	'tempat_lahir',	'tanggal_lahir',	'agama',	'gol_darah',	'hp',	'telp',	'email',	'warganegara',	'alamat',	'rt',	'rw',	'kelurahan',	'kecamata',	'kab_kota',	'provinsi',	'pos',	'status_marital',	'pendidikan_terakhir',	'suku',	'pekerjaan',	'penanggung_jawab',	'nama_ayah',	'nama_ibu',	'hubungan_dengan_penanggung_jawab',	'status_pasien'];
    protected $fillable=['nik','no_kk','status_hubungan','no_bpjs','no_rm','no_rm_lama','nama_lengkap','jenis_kelamin','tempat_lahir',
                         'tanggal_lahir','agama','gol_darah','hp','telp','email','warganegara','alamat','rt','rw','kelurahan','kecamatan',
                         'kab_kota','provinsi','pos','status_marital','pendidikan_terakhir','suku','pekerjaan','nama_ayah','nama_ibu','penanggung_jawab',
                         'hubungan_dengan_penanggung_jawab','no_contact_darurat','status_pasien','wilayah_kerja','tglmulaiaktif','tglakhirberlaku','kdproviderpeserta_bpjs',
                         'kdprovidergigi_bpjs','kodejeniskelas_bpjs','jeniskelas_bpjs','jenis_peserta_bpjs','kodejenis_peserta_bpjs','aktif_bpjs','keterangan_aktif_bpjs',
                         'kode_asuransi_bpjs','nama_asuransi_bpjs','no_asuransi_bpjs','tunggakan_bpj'];
                         
}
