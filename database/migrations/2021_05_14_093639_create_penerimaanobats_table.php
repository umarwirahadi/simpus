<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaanobatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaanobats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_obat')->unsigned();
            $table->string('satuan',50);
            $table->integer('jumlah_penermaan');
            $table->date('tanggal_penermaan');
            $table->dateTime('tanggal_kadaluarsa');
            $table->time('waktu_penermaan');
            $table->string('no_batch',100);
            $table->string('petugas_pengirim')->nullable();
            $table->integer('id_petugas')->unsigned();
            $table->string('keterangan')->nullable();
            $table->string('status',1);
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
        Schema::dropIfExists('penerimaanobats');
    }
}
