<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('tanggal');
            $table->bigInteger('id_pendaftaran')->unsigned();
            $table->bigInteger('id_pemeriksaan')->unsigned();
            $table->bigInteger('id_pengeluaran_obat')->unsigned();
            $table->decimal('grand_total')->nullable();            
            $table->string('jenis_pembayaran',30);
            $table->decimal('pembayaran')->nullable();            
            $table->string('keterangan');
            $table->string('status_pelayanan_farmasi',50);
            $table->string('pcare_kdObatSK',30);
            $table->string('pcare_noKunjungan',100);
            $table->string('pcare_racikan',5);
            $table->string('pcare_kdRacikan',100);
            $table->string('pcare_obatDPHO',5);
            $table->string('pcare_kdObat',30);
            $table->string('pcare_signa1',30);
            $table->string('pcare_signa2',30);
            $table->integer('pcare_jmlObat');
            $table->integer('pcare_jmlPermintaan');
            $table->string('pcare_nmObatNonDPHO');  
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
        Schema::dropIfExists('farmasis');
    }
}
