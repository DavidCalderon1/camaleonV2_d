<?php

namespace App\Repositories\Admin\Pc;

use App\Models\Admin\Pc\pc_clase;
use InfyOm\Generator\Common\BaseRepository;
use DB;
use App\Http\Controllers\Traits\funcionesComunes;

class pc_claseRepository extends BaseRepository
{
    private $llave_foranea = 'id';
    
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
        return pc_clase::class;
    }

    use funcionesComunes;
}
