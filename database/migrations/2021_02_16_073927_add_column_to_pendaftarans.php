<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToPendaftarans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            // $table->string('idpasien');
            // $table->string('noantrian')->nullable();
            // $table->string('nokwitansi')->nullable();
            // $table->string('usia_tahun')->nullable();
            // $table->string('usia_bulan')->nullable();
            // $table->string('usia_hari')->nullable();
            // $table->text('deskripsi')->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            //
        });
    }
}
