<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerTotalesTransaccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE TRIGGER totales_transaccion 
    AFTER INSERT OR UPDATE OR DELETE ON movimiento_contable
    FOR EACH ROW EXECUTE PROCEDURE actualizar_totales_transaccion();
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec("DROP TRIGGER IF EXISTS totales_transaccion ON movimiento_contable;");
    }
}
