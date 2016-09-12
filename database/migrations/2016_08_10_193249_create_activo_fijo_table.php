<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivoFijoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activo_fijo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cuenta_aux_id')->unsigned();
            $table->foreign('cuenta_aux_id')->references('id')->on('pc_cuentaauxiliar');
            $table->text('descripcion');
            $table->string('marca',100);
            $table->string('modelo',100);
            $table->date('fecha_adquisicion');
            $table->integer('valor_compra');
            $table->integer('cantidad');
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
        Schema::drop('activo_fijo');
    }
}
