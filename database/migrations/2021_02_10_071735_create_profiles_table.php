<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_puskesmas');
            $table->string('kode_puskesmas');
            $table->string('nama_puskesmas');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kota_kab');
            $table->string('provinsi');
            $table->string('pos');
            $table->string('telp');
            $table->string('email');
            $table->string('no_ijin');
            $table->string('tanggal');
            $table->string('no_register');
            $table->string('nip_kapus');
            $table->string('nip_katu');
            $table->string('logo');
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
        Schema::dropIfExists('profiles');
    }
}
