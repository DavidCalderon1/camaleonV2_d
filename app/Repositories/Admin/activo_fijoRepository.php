<?php

namespace App\Repositories\Admin;

use App\Models\Admin\activo_fijo;
use InfyOm\Generator\Common\BaseRepository;

class activo_fijoRepository extends BaseRepository
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
        return activo_fijo::class;
    }
}
