<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePcGrupoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_grupo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 2);
            $table->string('nombre', 255);
            $table->string('tipo', 10);
            $table->text('descripcion');
            $table->string('ajuste', 10);
            $table->boolean('nativa')->default(false);
            $table->integer('clase_id')->unsigned();
            $table->foreign('clase_id')->references('id')->on('pc_clase');
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
        Schema::drop('pc_grupo');
    }
}
