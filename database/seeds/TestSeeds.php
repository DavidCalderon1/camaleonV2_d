<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TestSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(App\User::class, 20)->create();
        factory(App\Models\Sucursal::class, 20)->create();
        factory(App\Models\Admin\activo_fijo::class, 20)->create();
        factory(App\Models\Tercero::class, 20)->create();
        
        Model::reguard();
    }
}
