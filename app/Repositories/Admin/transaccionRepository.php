<?php

namespace App\Repositories\Admin;

use App\Models\Admin\transaccion;
use InfyOm\Generator\Common\BaseRepository;

class transaccionRepository extends BaseRepository
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
        return transaccion::class;
    }


    //recibe los parametros del where
    //ejemplo ->CodigoNombre('name'.'='.'pepe')
    public function Busqueda($condicion)
    {
        //de esta manera se obtienen como tipo json para llenar los registros con jquery
        return $this->model->whereRaw($condicion);
    }
}
