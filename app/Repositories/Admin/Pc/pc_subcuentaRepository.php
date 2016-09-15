<?php

namespace App\Repositories\Admin\Pc;

use App\Models\Admin\Pc\pc_subcuenta;
use InfyOm\Generator\Common\BaseRepository;
use DB;
use App\Http\Controllers\Traits\funcionesComunes;

class pc_subcuentaRepository extends BaseRepository
{
    private $llave_foranea = 'cuenta_id';
    
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
        return pc_subcuenta::class;
    }

    use funcionesComunes;
}
