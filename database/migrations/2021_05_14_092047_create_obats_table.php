<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode',50);
            $table->string('nama_obat',100);
            $table->string('jenis',100);
            $table->string('satuan',50);
            $table->decimal('harga',8,2)->nullable();
            $table->integer('stok_awal');
            $table->integer('sisa_stok');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('obats');
    }
}
