<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TestSeeds extends Seeder
{
    public $activo_fijo;
    public $tercero;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
       
        
        //User
        factory(App\User::class, 20)->create();
        //Sucursal
        factory(App\Models\Sucursal::class, 20)->create();
        //activo_fijo
        factory(App\Models\Admin\activo_fijo::class, 20)->create();
        //Tercero
        factory(App\Models\Tercero::class, 20)->create()->each(function($u) {
            if ($u->tipo == 'JURIDICA') {
            //Empresa
                $u->empresas()->save(factory(App\Models\Empresa::class)->make() );
            }else if ($u->tipo == 'NATURAL') {
            //Persona
                $u->personas()->save(factory(App\Models\Persona::class)->make() );
            }
            //Materia_Prima
            $u->materia_prima()->save(factory(App\Models\Materia_Prima::class)->make() );
        });

        //transaccion
        factory(App\Models\Admin\transaccion::class, 20)->create()->each(function($tr) {
            //movimiento_contable
            $tr->movimiento_contable()->save(factory(App\Models\Admin\movimiento_contable::class)->make() );
            $tr->movimiento_contable()->save(factory(App\Models\Admin\movimiento_contable::class)->make() );
            $tr->movimiento_contable()->save(factory(App\Models\Admin\movimiento_contable::class)->make() );
            $tr->movimiento_contable()->save(factory(App\Models\Admin\movimiento_contable::class)->make() );
            $tr->movimiento_contable()->save(factory(App\Models\Admin\movimiento_contable::class)->make() );
            
        });
        
        //sincronizar o asignar terceros o activos a los movimientos contables
        $this->activo_fijo = App\Models\Admin\activo_fijo::lists('id')->toArray();
        $this->tercero = App\Models\Tercero::lists('id')->toArray();
        $movimiento_contableT = App\Models\Admin\movimiento_contable::whereRaw('limit 50 offset 0')->orderBy('id','desc');
        $movimiento_contableA = App\Models\Admin\movimiento_contable::whereRaw('limit 50 offset 50')->orderBy('id','desc');
        
        foreach ($movimiento_contableT as $movimiento_cont) {
            $movimiento_cont->activo_fijo()->sync( array(array_rand($this->activo_fijo) ) );
        }
        foreach ($movimiento_contableA as $movimiento_cont) {
            $movimiento_cont->tercero()->sync( array(array_rand($this->tercero) ) );
        }
        
        
        

        Model::reguard();
    }
}
