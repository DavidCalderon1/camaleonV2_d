<?php

namespace App\Repositories\Admin\Puc;

use App\Models\Admin\Puc\puc_clase;
use InfyOm\Generator\Common\BaseRepository;
use DB;

class puc_claseRepository extends BaseRepository
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
        return puc_clase::class;
    }

    /**
     * @param $busqueda
     * @return mixed
     */
    public function busqueda($busqueda)
    {
        return $this->model->where('codigo', 'like', '%'.strtoupper($busqueda).'%')->orWhere(DB::raw("deleted_at is null and upper(nombre) like '%".strtoupper($busqueda)."%' and null"));
        /*return $this->model->where(function($model) {
                return $model->where('codigo', 'like', '%'.$busqueda.'%')->orWhere('nombre', 'like', '%'.$busqueda.'%');
            };
        */
        
    }

    /**
     * @param $busqueda
     * @return mixed
     */
    public function listaid($busqueda)
    {
        if($busqueda == '*' || $busqueda == '' ){
            return $this->model;
        }else{
            return $this->model->where('id', '=', intval( $busqueda ));
        }
    }
}
