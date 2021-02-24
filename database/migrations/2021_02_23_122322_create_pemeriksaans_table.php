<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idpasien');
            $table->bigInteger('id_pendaftaran');
            $table->date('tanggal');
            $table->time('jam');
            $table->string('kunjungan');
            $table->string('kasus');
            $table->string('sistol',30);
            $table->string('diastol',30);
            $table->string('tekanan_nadi',50);
            $table->string('respirasi');
            $table->string('suhu',30);
            $table->string('berat_badan',30);
            $table->string('tinggi_badan',30);
            $table->string('keluhan_utama');
            $table->string('pemeriksaan_fisik');
            $table->string('anamnesa');
            $table->string('terapi');
            $table->string('diagnosa');
            $table->string('keterangan');
            $table->string('id_petugas',100);
            $table->boolean('status');
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
        Schema::dropIfExists('pemeriksaans');
    }
}
