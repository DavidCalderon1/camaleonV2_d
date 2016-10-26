<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionActualizarTotalesTransaccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE OR REPLACE FUNCTION actualizar_totales_transaccion() RETURNS TRIGGER AS \$movimiento_contable$
    BEGIN
        --
        -- Update a row in transaccion to make sum of values in the operation performed on movimiento_contable,
        -- make use of the special variable TG_OP to work out the operation.
        --
        IF (TG_OP = 'DELETE') THEN
            UPDATE transaccion set total_debe = (SELECT SUM(debe) from movimiento_contable where deleted_at is null and trs_id = OLD.trs_id), total_haber = (SELECT SUM(haber) from movimiento_contable where deleted_at is null and trs_id = OLD.trs_id), diferencia = (SELECT SUM(debe) - SUM(haber) from movimiento_contable where deleted_at is null and trs_id = OLD.trs_id) where id = OLD.trs_id;
            RETURN OLD;
        ELSIF (TG_OP = 'UPDATE') THEN
            UPDATE transaccion set total_debe = (SELECT SUM(debe) from movimiento_contable where deleted_at is null and trs_id = NEW.trs_id), total_haber = (SELECT SUM(haber) from movimiento_contable where deleted_at is null and trs_id = NEW.trs_id), diferencia = (SELECT SUM(debe) - SUM(haber) from movimiento_contable where deleted_at is null and trs_id = NEW.trs_id) where id = NEW.trs_id;
            RETURN NEW;
        ELSIF (TG_OP = 'INSERT') THEN
            UPDATE transaccion set total_debe = (SELECT SUM(debe) from movimiento_contable where deleted_at is null and trs_id = NEW.trs_id), total_haber = (SELECT SUM(haber) from movimiento_contable where deleted_at is null and trs_id = NEW.trs_id), diferencia = (SELECT SUM(debe) - SUM(haber) from movimiento_contable where deleted_at is null and trs_id = NEW.trs_id) where id = NEW.trs_id;
            RETURN NEW;
        END IF;
        RETURN NULL; -- result is ignored since this is an AFTER trigger
    END;
    \$movimiento_contable$ LANGUAGE plpgsql;
                ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec("DROP FUNCTION IF EXISTS actualizar_totales_transaccion() CASCADE;");
    }
}
