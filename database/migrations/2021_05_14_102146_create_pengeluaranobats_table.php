<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaranobatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluaranobats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_farmasi')->unsigned();
            $table->bigInteger('id_obat')->unsigned();
            $table->dateTime('tanggal');
            $table->integer('jumlah');
            $table->string('satuan',50);
            $table->decimal('harga');
            $table->decimal('total');
            $table->string('keterangan');
            $table->string('status',2);
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
        Schema::dropIfExists('pengeluaranobats');
    }
}
