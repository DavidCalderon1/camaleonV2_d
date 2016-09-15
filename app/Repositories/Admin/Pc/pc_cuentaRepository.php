<?php

namespace App\Repositories\Admin\Pc;

use App\Models\Admin\Pc\pc_cuenta;
use InfyOm\Generator\Common\BaseRepository;
use DB;
use App\Http\Controllers\Traits\funcionesComunes;

class pc_cuentaRepository extends BaseRepository
{
    private $llave_foranea = 'grupo_id';

    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return pc_cuenta::class;
    }

    use funcionesComunes;
}
