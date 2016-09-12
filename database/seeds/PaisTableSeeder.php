<?php

use Illuminate\Database\Seeder;

class PaisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pais')->delete();
        
        \DB::table('pais')->insert(array (
            0 => 
            array (
                //'id' => 1,
                'nombre' => 'COLOMBIA',
                'codigo_ref' => '57',
                'nativo' => true,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
