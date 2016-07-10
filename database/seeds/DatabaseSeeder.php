<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(PermissionRoleSeeder::class);
        $this->call('PucClaseTableSeeder');
        $this->call('PucGrupoTableSeeder');
        $this->call('PucCuentaTableSeeder');
        $this->call('PucSubcuentaTableSeeder');

        Model::reguard();
    }
}
