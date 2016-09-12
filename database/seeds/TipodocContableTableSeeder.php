<?php

use Illuminate\Database\Seeder;

class TipodocContableTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tipodoc_contable')->delete();
        
        \DB::table('tipodoc_contable')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sigla' => 'FCC',
                'descripcion' => 'FACTURA DE COMPRA',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'sigla' => 'CPE',
                'descripcion' => 'COMPROBANTE DE EGRESO',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'sigla' => 'FCV',
                'descripcion' => 'FACTURA DE VENTA',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'sigla' => 'RBC',
                'descripcion' => 'RECIBO DE CAJA',
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
