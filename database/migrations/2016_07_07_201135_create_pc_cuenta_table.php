<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePcCuentaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_cuenta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 4);
            $table->string('nombre', 255);
            $table->string('tipo', 10);
            $table->text('descripcion');
            $table->string('ajuste', 10);
            $table->boolean('nativa')->default(false);
            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')->on('pc_grupo');
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
        Schema::drop('pc_cuenta');
    }
}
