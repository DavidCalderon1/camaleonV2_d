<?php

use Illuminate\Database\Seeder;

class DepartamentoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('departamento')->delete();
        
        \DB::table('departamento')->insert(array (
            0 => 
            array (
                //'id' => 1,
                'nombre' => 'ANTIOQUIA',
                'codigo_ref' => '5',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                //'id' => 2,
                'nombre' => 'ATLANTICO',
                'codigo_ref' => '8',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                //'id' => 3,
                'nombre' => 'BOGOTA',
                'codigo_ref' => '11',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                //'id' => 4,
                'nombre' => 'BOLIVAR',
                'codigo_ref' => '13',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                //'id' => 5,
                'nombre' => 'BOYACA',
                'codigo_ref' => '15',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                //'id' => 6,
                'nombre' => 'CALDAS',
                'codigo_ref' => '17',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                //'id' => 7,
                'nombre' => 'CAQUETA',
                'codigo_ref' => '18',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                //'id' => 8,
                'nombre' => 'CAUCA',
                'codigo_ref' => '19',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                //'id' => 9,
                'nombre' => 'CESAR',
                'codigo_ref' => '20',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                //'id' => 10,
                'nombre' => 'CORDOBA',
                'codigo_ref' => '23',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                //'id' => 11,
                'nombre' => 'CUNDINAMARCA',
                'codigo_ref' => '25',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                //'id' => 12,
                'nombre' => 'CHOCO',
                'codigo_ref' => '27',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                //'id' => 13,
                'nombre' => 'HUILA',
                'codigo_ref' => '41',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                //'id' => 14,
                'nombre' => 'LA GUAJIRA',
                'codigo_ref' => '44',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                //'id' => 15,
                'nombre' => 'MAGDALENA',
                'codigo_ref' => '47',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                //'id' => 16,
                'nombre' => 'META',
                'codigo_ref' => '50',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                //'id' => 17,
                'nombre' => 'NARINO',
                'codigo_ref' => '52',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                //'id' => 18,
                'nombre' => 'NORTE DE SANTANDER',
                'codigo_ref' => '54',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                //'id' => 19,
                'nombre' => 'QUINDIO',
                'codigo_ref' => '63',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                //'id' => 20,
                'nombre' => 'RISARALDA',
                'codigo_ref' => '66',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                //'id' => 21,
                'nombre' => 'SANTANDER',
                'codigo_ref' => '68',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                //'id' => 22,
                'nombre' => 'SUCRE',
                'codigo_ref' => '70',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                //'id' => 23,
                'nombre' => 'TOLIMA',
                'codigo_ref' => '73',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                //'id' => 24,
                'nombre' => 'VALLE DEL CAUCA',
                'codigo_ref' => '76',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                //'id' => 25,
                'nombre' => 'ARAUCA',
                'codigo_ref' => '81',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                //'id' => 26,
                'nombre' => 'CASANARE',
                'codigo_ref' => '85',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                //'id' => 27,
                'nombre' => 'PUTUMAYO',
                'codigo_ref' => '86',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                //'id' => 28,
                'nombre' => 'SAN ANDRES',
                'codigo_ref' => '88',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                //'id' => 29,
                'nombre' => 'AMAZONAS',
                'codigo_ref' => '91',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                //'id' => 30,
                'nombre' => 'GUAINIA',
                'codigo_ref' => '94',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                //'id' => 31,
                'nombre' => 'GUAVIARE',
                'codigo_ref' => '95',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                //'id' => 32,
                'nombre' => 'VAUPES',
                'codigo_ref' => '97',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                //'id' => 33,
                'nombre' => 'VICHADA',
                'codigo_ref' => '99',
                'nativo' => true,
                'pais_id' => 1,
                'created_at' => '0001-01-01 00:00:00',
                'updated_at' => '0001-01-01 00:00:00',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
