<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert([
			'role_title' => 'Administrador',
			'role_slug' => 'admin',
		]);
    }
}
