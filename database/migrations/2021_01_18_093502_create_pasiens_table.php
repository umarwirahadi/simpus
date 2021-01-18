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
            $table->string('no_kk');
            $table->string('nik');
            $table->string('no_rm');
            $table->string('status_hubungan');
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('gol_darah',5);
            $table->string('hp');
            $table->string('telp');
            $table->string('email');
            $table->string('warganegara');
            $table->string('alamat');
            $table->string('rt',5);
            $table->string('rw',5);
            $table->string('kelurahan');
            $table->string('kecamata');
            $table->string('kab_kota');
            $table->string('provinsi');
            $table->string('pos');
            $table->string('status_marital');
            $table->string('pendidikan_terakhir');
            $table->string('penanggung_jawab');
            $table->string('hubungan_dengan_penanggung_jawab');
            $table->string('status_pasien');
            $table->timestamps();
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
