<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionResetSequence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE OR REPLACE FUNCTION \"reset_sequence\" (tablename text) RETURNS \"pg_catalog\".\"void\" AS 
                \$body$  
                  DECLARE 
                    idTable integer;
                  BEGIN 
                  EXECUTE 'SELECT id + 1 FROM \"' || tablename || '\" ORDER BY id DESC LIMIT 1'
                       INTO idTable;
                      
                  IF idTable IS NULL THEN
                    idTable = 1;
                  END IF;

                  EXECUTE 'SELECT setval( ''' 
                  || tablename  
                  || '_id_seq'', ' 
                  || idTable  
                  || ', false)';  
                  RETURN;
                  END;  
                \$body$  LANGUAGE 'plpgsql';
                ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec("DROP FUNCTION IF EXISTS reset_sequence();");
    }
}
