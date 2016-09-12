<?php

namespace App\Repositories\Admin\Pc;

use App\Models\Admin\Pc\pc_grupo;
use InfyOm\Generator\Common\BaseRepository;
use DB;
use App\Http\Controllers\Traits\funcionesComunes;

class pc_grupoRepository extends BaseRepository
{
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
        return pc_grupo::class;
    }

    use funcionesComunes;
}
