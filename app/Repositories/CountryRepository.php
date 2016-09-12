<?php

namespace App\Repositories;

use App\Models\Country;
use InfyOm\Generator\Common\BaseRepository;

class CountryRepository extends BaseRepository
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
        return Country::class;
    }

    /**
     * Comprueba si hay departamentos relacionados para el pais segun el id_pais pasado por parametro.
     *
     * @param  int $id_pais
     *
     * @return Boolean
     */
    public function related_states($id_pais)
    {
        if(isset(Country::has('states')->find($id_pais)->states)){
            return true;
        }
        return false;
    }

    /**
     * Valida que el nombre y el codigo ingresado al crear o actualizar pais sean unicos.
     *
     * @param  string $nombre 
     * @param  string $codigo
     * @param  int $id = null
     *
     * @return Boolean
     */
    public function validar($nombre, $codigo, $id = null)
    {
        $registros = 0;
        if (empty($id)){
            $registros = Country::where('nombre','=', strtoupper($nombre))->orWhere('codigo_ref', '=', $codigo)->get()->count();
        }else{
            $_SESSION['pais'] = strtoupper($nombre);
            $_SESSION['codigo'] = $codigo;
            $registros = Country::where('id', '!=', $id)->where(function($q){ $q->where('nombre','=', $_SESSION['pais'])->orWhere('codigo_ref', '=', $_SESSION['codigo']); })->get()->count();
        }
        if($registros > 0){
            return true;
        }
        return false;     
    }

    /**
     * Filtro por nombre de pais.
     *
     * @param  string $country
     *
     * @return result query countries
     */
    public function search($country)
    {
        $countries = Country::Where('nombre','LIKE','%' . strtoupper($country) . '%')->paginate(20);
        return $countries;
    }
}
