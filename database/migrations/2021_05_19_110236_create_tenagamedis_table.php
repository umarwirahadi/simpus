<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenagamedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenagamedis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nip',50)->nullable();
            $table->string('nama_lengkap',150);
            $table->string('jenistenagamedis',50);
            $table->string('bidang_pelayanan',100)->nullable();
            $table->string('hp',20);
            $table->string('alamat')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->date('tgl_gabung');
            $table->string('no_ijin')->nullable();
            $table->string('status',2);
            $table->string('keterangan')->nullable();
            $table->string('kdDokter_pcare',30)->nullable();
            $table->string('nmDokter_pcare',150)->nullable();
            $table->bigInteger('id_petugas')->unsigned();
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
        Schema::dropIfExists('tenagamedis');
    }
}
