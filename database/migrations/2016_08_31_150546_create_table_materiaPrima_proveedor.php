<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMateriaPrimaProveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiaPrima_proveedor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tercero_id')->unsigned();
            $table->foreign('tercero_id')->references('id')->on('tercero');
            $table->integer('materiaPrima_id')->unsigned();
            $table->foreign('materiaPrima_id')->references('id')->on('materia_prima');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('materiaPrima_proveedor');
    }
}
