<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePucSubcuentaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puc_subcuenta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 6);
            $table->string('nombre', 255);
            $table->text('descripcion');
            $table->string('ajuste', 10);
            $table->boolean('nativa')->default(false);
            $table->integer('cuenta_id')->unsigned();
            $table->foreign('cuenta_id')->references('id')->on('puc_cuenta');
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
        Schema::drop('puc_subcuenta');
    }
}
