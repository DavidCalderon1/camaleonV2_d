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

        factory(App\User::class, 50)->create();
        factory(App\Models\Sucursal::class, 50)->create();
        
        Model::reguard();
    }
}
