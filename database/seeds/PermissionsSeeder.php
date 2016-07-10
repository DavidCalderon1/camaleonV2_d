<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
            'id' => 1,
			'permission_title' => 'Administrar usuarios',
			'permission_slug' => 'admin_usuarios',
			'permission_description' => 'Administrar usuarios',
            ),
            1 => 
            array (
            'id' => 2,
            'permission_title' => 'Administrar roles',
            'permission_slug' => 'admin_roles',
            'permission_description' => 'Administrar roles',
            ),
            2 => 
            array (
            'id' => 3,
            'permission_title' => 'Administrar logs',
            'permission_slug' => 'admin_logs',
            'permission_description' => 'Administrar logs',
            ),
            3 => 
            array (
            'id' => 4,
            'permission_title' => 'Administrar puc',
            'permission_slug' => 'admin_puc',
            'permission_description' => 'Administrar puc',
            ),
        ));
    }
}
