<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePucClaseTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puc_clase', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 1);
            $table->string('nombre', 255);
            $table->text('descripcion');
            $table->string('ajuste', 10);
            $table->string('naturaleza', 10);
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
        Schema::drop('puc_clase');
    }
}
