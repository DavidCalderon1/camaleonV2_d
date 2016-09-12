<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePcSubcuentaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_subcuenta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 6);
            $table->string('nombre', 255);
            $table->string('tipo', 10);
            $table->text('descripcion');
            $table->string('ajuste', 10);
            $table->boolean('nativa')->default(false);
            $table->integer('cuenta_id')->unsigned();
            $table->foreign('cuenta_id')->references('id')->on('pc_cuenta');
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
        Schema::drop('pc_subcuenta');
    }
}
