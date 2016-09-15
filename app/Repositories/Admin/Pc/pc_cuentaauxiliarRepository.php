<?php

namespace App\Repositories\Admin\Pc;

use App\Models\Admin\Pc\pc_cuentaauxiliar;
use InfyOm\Generator\Common\BaseRepository;
use DB;
use App\Http\Controllers\Traits\funcionesComunes;

class pc_cuentaauxiliarRepository extends BaseRepository
{
    private $llave_foranea = 'subcuenta_id';
    
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
        return pc_cuentaauxiliar::class;
    }
    
    use funcionesComunes;
}
