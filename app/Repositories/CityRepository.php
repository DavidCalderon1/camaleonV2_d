<?php

namespace App\Repositories;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use InfyOm\Generator\Common\BaseRepository;

class CityRepository extends BaseRepository
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
        return City::class;
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
     * Lista los departamentos segun el pais_id
     *
     * @param int $pais_id
     *
     * @return list states
     */
    public function listStates($pais_id = null)
    {
        return State::where('pais_id', $pais_id)->lists('nombre','id');
    }    

    /**
     * Lista las ciudades segun el departamento_id
     *
     * @param int $departamento_id
     *
     * @return list cities
     */
    public function listCities($departamento_id = null)
    {
        return City::where('departamento_id', $departamento_id)->lists('nombre','id');
    }

    /**
     * Valida el codigo ingresado al crear o actualizar ciudad el cual debe ser unico para el departamneto seleccionado.
     *
     * @param  int $departamento_id
     * @param  string $nombre
     * @param  string $codigo
     * @param  int $id = null
     *
     * @return Boolean
     */
    public function validar($departamento_id, $nombre, $codigo, $id = null)
    {
        $registros = 0;
        if (empty($id)) {
            $_SESSION['nombre'] = strtoupper($nombre);
            $_SESSION['codigo'] = $codigo;
            $registros = City::where('departamento_id', '=', $departamento_id)->where(function($q){ $q->where('nombre', '=', $_SESSION['nombre'])->orWhere('codigo_ref','=', $_SESSION['codigo']); })->get()->count();
        }else{
            $_SESSION['nombre'] = strtoupper($nombre);
            $_SESSION['codigo'] = $codigo;
            $registros = City::where('id', '!=', $id)->where('departamento_id', '=', $departamento_id)->where(function($q){ $q->where('nombre', '=', $_SESSION['nombre'])->orWhere('codigo_ref','=',$_SESSION['codigo']); })->get()->count();
        }
        
        if($registros > 0){
            return true;
        }
        return false;     
    }

    /**
     * Filtro por nombre de pais, departamento y ciudad.
     *
     * @param  string $country
     * @param  string $state
     * @param  string $city
     *
     * @return result query cities and ralated states and countries
     */
    public function search($country, $state, $city)
    {
        $_SESSION['country'] = strtoupper($country);
        $_SESSION['state'] = strtoupper($state);
        $cities = City::Where('nombre','LIKE','%' . strtoupper($city) . '%')->WhereHas('state', function($q){ 
            $q->where('nombre','LIKE','%' . $_SESSION['state'] . '%')->WhereHas('country', function($q){ 
                $q->where('nombre','LIKE','%' . $_SESSION['country'] . '%'); 
            }); 
        })->with('state.country')->paginate(20);
        return $cities;
    }

    /**
     * Comprueba si hay sucursales relacionadas para la ciudad segun el id_city pasado por parametro.
     *
     * @param  int $id_city
     *
     * @return Boolean
     */
    public function relateds($id_city)
    {
        if(isset(City::has('sucursales')->find($id_city)->sucursales)){
            return true;
        }elseif (isset(City::has('personas')->find($id_city)->personas)) {
            return true;
        }elseif (isset(City::has('empresas')->find($id_city)->empresas)) {
            return true;
        }
        return false;
    }
}
