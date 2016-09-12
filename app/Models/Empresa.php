<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tercero;
use App\Models\City;

/**
 * @SWG\Definition(
 *      definition="Empresa",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nit",
 *          description="nit",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="razon_social",
 *          description="razon_social",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="naturaleza",
 *          description="naturaleza",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="fecha_constitucion",
 *          description="fecha_constitucion",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="ciudad_id",
 *          description="ciudad_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="direccion",
 *          description="direccion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="telefono",
 *          description="telefono",
 *          type="string"
 *      )
 * )
 */
class Empresa extends Model
{
    use SoftDeletes;

    public $table = 'empresa';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nit',
        'razon_social',
        'naturaleza',
        'fecha_constitucion',
        'ciudad_id',
        'direccion',
        'telefono',
        'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nit' => 'string',
        'razon_social' => 'string',
        'naturaleza' => 'string',
        'fecha_constitucion' => 'date',
        'ciudad_id' => 'integer',
        'direccion' => 'string',
        'telefono' => 'string',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'razon_social' => 'required|max:100',
        'naturaleza' => 'required',
        'fecha_constitucion' => 'required',
        'nit' => 'required|unique:empresa|max:50|regex:/^[a-zA-Z0-9_]+$/',
        'ciudad_id' => 'required',
        'direccion' => 'required|max:255',
        'telefono' => 'required|max:20|regex:[[0-9]+]'
    ];

    /**
     * Especifica la relacion muchos a muchos con el modelo Tercero
     *
     */
    public function terceros()
    {
        return $this->belongsToMany(Tercero::class, 'tercero_empresa'/*, 'id', 'empresa_id'*/);
    }

    /**
     * Especifica y construye el contrario de la relacion uno a muchos con el modelo City
     *
     * @return relationship
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'ciudad_id', 'id');
    }
}
