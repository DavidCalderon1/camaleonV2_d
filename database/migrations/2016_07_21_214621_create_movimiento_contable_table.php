<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientoContableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_contable', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('trs_id')->unsigned();
            $table->foreign('trs_id')->references('id')->on('transaccion');

            $table->integer('suc_id')->unsigned();
            $table->foreign('suc_id')->references('id')->on('sucursal');

            $table->integer('cntaux_id')->unsigned();
            $table->foreign('cntaux_id')->references('id')->on('pc_cuentaauxiliar');
            $table->double('debe');
            $table->double('haber');
            $table->text('detalle');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movimiento_contable');
    }
}
