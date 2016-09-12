<?php

namespace App\Http\Controllers\Traits;
use DB;
    
trait funcionesComunes{
    /**
     * @param $busqueda
     * @return mixed
     */
    public function busqueda($tipo_cuenta, $busqueda)
    {	
		if( strtoupper($tipo_cuenta) =='%%' ){
			$tipo_cuenta = '';
		}
        return $this->model->where('tipo', 'like', '%'.strtoupper($tipo_cuenta).'%')
            ->where('codigo', 'like', '%'.strtoupper($busqueda).'%')
            ->orWhere(DB::raw("deleted_at is null and upper(nombre) like '%".strtoupper($busqueda)."%' and null"))
            ->where('tipo', 'like', '%'.strtoupper($tipo_cuenta).'%');
        /*return $this->model->where(function($model) {
                return $model->where('codigo', 'like', '%'.$busqueda.'%')->orWhere('nombre', 'like', '%'.$busqueda.'%');
            };
        */
        
    }

    /**
     * @param $busqueda
     * @return mixed
     */
    public function listaid($tipo_cuenta, $busqueda)
    {
        if( strtoupper($tipo_cuenta) =='%%' ){
            $tipo_cuenta = '';
        }
        if($busqueda == '*' || $busqueda == '' || $busqueda == $tipo_cuenta ){
            return $this->model->where('tipo', 'like', '%'.strtoupper($tipo_cuenta).'%');
        }else{
            return $this->model->where('tipo', 'like', '%'.strtoupper($tipo_cuenta).'%')->where('id', '=', intval( $busqueda ));
        }
    }

    /**
     * @param $busqueda
     * @return mixed
     */
    public function ordenarPor($campos)
    {
        //recorre el array que llega obteniendo cada campo y el tipo de ordenamiento
        foreach($campos as $campo => $orden){
            $this->model = $this->model->orderBy($campo, $orden);
        }
        return $this->model;
    }
}