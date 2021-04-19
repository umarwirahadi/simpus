<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcaresettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcaresettings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username_pcare',50)->nullable();
            $table->string('password_pcare',50)->nullable();
            $table->string('consumen_pcare',50)->nullable();
            $table->string('secretkey_pcare',50)->nullable();
            $table->string('timestamp_pcare',100)->nullable();
            $table->string('signature_pcare',250)->nullable();
            $table->string('authorization_pcare',250)->nullable();
            $table->string('aplicationcode_pcare',30)->nullable();
            $table->string('description',30)->nullable();
            $table->boolean('status');
            $table->unsignedBigInteger('id_petugas');
            $table->foreign('id_petugas')->references('id')->on('users');
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
        Schema::dropIfExists('pcaresettings');
    }
}
