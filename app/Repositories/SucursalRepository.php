<?php

namespace App\Repositories;

use App\Models\Sucursal;
use InfyOm\Generator\Common\BaseRepository;

class SucursalRepository extends BaseRepository
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
        return Sucursal::class;
    }

    /**
     * Valida el nombre ingresado al crear o actualizar sucursal el cual debe ser unico para la ciudad seleccionada.
     *
     * @param  int $id_city
     * @param  string $nombre
     * @param  int $id = null
     *
     * @return Boolean
     */
    public function validar($id_city, $nombre, $id = null)
    {
        $registros = 0;
        if (empty($id)) {
            $registros = Sucursal::where('ciudad_id', '=', $id_city)->where('nombre', '=', $nombre)->get()->count();
        }else{
            $registros = Sucursal::where('id', '!=', $id)->where('ciudad_id', '=', $id_city)->where('nombre', '=', $nombre)->get()->count();
        }
        
        if($registros > 0){
            return true;
        }
        return false;
    }

    /**
     * Filtra las sucursales por nombre.
     *
     * @param  string $nombre
     *
     * @return Boolean
     */
    public function search($nombre)
    {
        $sucursales = Sucursal::where('nombre', 'LIKE', '%' . strtoupper($nombre) . '%')->paginate(20);
        return $sucursales;
    } 
}
