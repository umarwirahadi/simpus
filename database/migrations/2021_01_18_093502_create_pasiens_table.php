<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik');
            $table->string('no_kk')->nullable();
            $table->string('status_hubungan')->nullable();
            $table->string('no_bpjs')->nullable();
            $table->string('no_rm')->nullable();
            $table->string('no_rm_lama')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('gol_darah',5)->nullable();
            $table->string('hp')->nullable();
            $table->string('telp')->nullable();
            $table->string('email')->nullable();
            $table->string('warganegara')->nullable();
            $table->string('alamat')->nullable();
            $table->string('rt',5)->nullable();
            $table->string('rw',5)->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamata')->nullable();
            $table->string('kab_kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('pos')->nullable();
            $table->string('status_marital')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('suku')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('penanggung_jawab')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('hubungan_dengan_penanggung_jawab')->nullable();
            $table->string('no_contact_darurat')->nullable();
            $table->string('status_pasien')->nullable();
            $table->timestamps();
            $table->unique('nik');
            $table->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
}
