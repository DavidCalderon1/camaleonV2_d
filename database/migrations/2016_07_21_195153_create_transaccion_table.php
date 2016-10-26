<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccion', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('tdc_id')->unsigned();
            $table->foreign('tdc_id')->references('id')->on('tipodoc_contable');
            $table->text('descripcion');
            $table->integer('total_debe')->default(0);
            $table->integer('total_haber')->default(0);
            $table->integer('diferencia')->default(0);
            $table->boolean('auto')->default(false);
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
        Schema::drop('transaccion');
    }
}
