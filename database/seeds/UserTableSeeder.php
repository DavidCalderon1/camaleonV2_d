<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        
        \DB::table('users')->insert([
			'name' => 'Soporte',
			'email' => 'Soporte@camaleon.org',
			'password' => bcrypt('Omega_252'),
			'created_at' => '0001-01-01 00:00:00',
			'updated_at' => '0001-01-01 00:00:00',
		]);
    }
}
