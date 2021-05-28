<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeicdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codeicds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode',100);
            $table->string('kode2',100);
            $table->string('eng'); 
            $table->string('idn'); 
            $table->string('desc');
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
        Schema::dropIfExists('codeicds');
    }
}
