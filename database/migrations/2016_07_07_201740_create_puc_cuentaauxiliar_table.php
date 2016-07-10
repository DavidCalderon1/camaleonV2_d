<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePucCuentaauxiliarTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puc_cuentaauxiliar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 10);
            $table->string('nombre', 255);
            $table->text('descripcion');
            $table->string('ajuste', 10);
            $table->boolean('tercero_activo');
            $table->boolean('estado');
            $table->integer('subcuenta_id')->unsigned();
            $table->foreign('subcuenta_id')->references('id')->on('puc_subcuenta');
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
        Schema::drop('puc_cuentaauxiliar');
    }
}
