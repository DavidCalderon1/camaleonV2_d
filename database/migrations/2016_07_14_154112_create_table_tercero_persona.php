<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTerceroPersona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tercero_persona', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('persona_id')->unsigned();
            $table->foreign('persona_id')->references('id')->on('persona');
            $table->integer('tercero_id')->unsigned();
            $table->foreign('tercero_id')->references('id')->on('tercero');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tercero_persona');
    }
}
