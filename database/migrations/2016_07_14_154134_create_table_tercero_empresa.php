<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTerceroEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tercero_empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresa');
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
        Schema::drop('tercero_empresa');
    }
}
