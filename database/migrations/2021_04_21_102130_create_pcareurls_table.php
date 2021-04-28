<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcareurlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcareurls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('endpoint',50);
            $table->string('domain');
            $table->string('method',50);
            $table->string('description')->nullable();
            $table->string('status',1);
            $table->string('id_user');
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
        Schema::dropIfExists('pcareurls');
    }
}
