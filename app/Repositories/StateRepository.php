<?php

namespace App\Repositories;

use App\Models\State;
use App\Models\Country;
use App\Models\City;
use InfyOm\Generator\Common\BaseRepository;

class StateRepository extends BaseRepository
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
        return State::class;
    }

    /**
     * Lista todos los paises
     *
     * @return list countries
     */
    public function listCountries()
    {
        return Country::lists('nombre','id');
    }

    /**
     * Comprueba si hay ciudades relacionadas para el departamento segun el id_state pasado por parametro.
     *
     * @param  int $id_state
     *
     * @return Boolean
     */
    public function related_cities($id_state)
    {
        if(isset(State::has('cities')->find($id_state)->cities)){
            return true;
        }
        return false;
    }

    /**
     * Valida el codigo ingresado al crear o actualizar departamento sea unico para el pais seleccionado.
     *
     * @param  int $pais_id
     * @param  string $nombre
     * @param  string $codigo
     * @param  int $id = null
     *
     * @return Boolean
     */
    public function validar($pais_id, $nombre, $codigo, $id = null)
    {
        $registros = 0;
        if(empty($id)){
            $_SESSION['nombre'] = strtoupper($nombre);
            $_SESSION['codigo'] = $codigo;
            $registros = State::where('pais_id', '=', $pais_id)->where(function($q){ $q->where('nombre', '=', $_SESSION['nombre'])->orWhere('codigo_ref','=', $_SESSION['codigo']); })->get()->count();
        }else{
            $_SESSION['nombre'] = strtoupper($nombre);
            $_SESSION['codigo'] = $codigo;
            $registros = State::where('id', '!=', $id)->where('pais_id', '=', $pais_id)->where(function($q){ $q->where('nombre', '=', $_SESSION['nombre'])->orWhere('codigo_ref','=',$_SESSION['codigo']); })->get()->count();
        }
        if($registros > 0){
            return true;
        }
        return false;     
    }

    /**
     * Filtro por nombre de pais y departamento.
     *
     * @param  string $country
     * @param  string $state
     *
     * @return result query states and related countries
     */
    public function search($country, $state)
    {
        $_SESSION['country'] = strtoupper($country);
        $states = State::Where('nombre','LIKE','%' . strtoupper($state) . '%')->WhereHas('country', function($q){ 
                $q->where('nombre','LIKE','%' . $_SESSION['country'] . '%'); 
            })->with('country')->paginate(20);
        return $states;
    }
}
