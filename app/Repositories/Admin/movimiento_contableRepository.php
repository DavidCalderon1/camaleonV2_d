<?php

namespace App\Repositories\Admin;

use App\Models\Admin\movimiento_contable;
use InfyOm\Generator\Common\BaseRepository;

class movimiento_contableRepository extends BaseRepository
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
        return movimiento_contable::class;
    }
}
