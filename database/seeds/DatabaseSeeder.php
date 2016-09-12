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
        
        $this->call('PaisTableSeeder');
        $this->call('DepartamentoTableSeeder');
        $this->call('CiudadTableSeeder');
	
        $this->call('PcClaseTableSeeder');
        $this->call('PcGrupoTableSeeder');
        $this->call('PcCuentaTableSeeder');
        $this->call('PcSubcuentaTableSeeder');
        $this->call('PcCuentaauxiliarTableSeeder');
	
        $this->call('TipodocContableTableSeeder');

        Model::reguard();
    }
}
