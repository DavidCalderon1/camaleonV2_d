<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientoContableTerceroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_contable_tercero', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movimiento_contable_id');
            $table->integer('tercero_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movimiento_contable_tercero');
    }
}
