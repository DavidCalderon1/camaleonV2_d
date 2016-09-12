<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tercero;
use App\Models\City;

/**
 * @SWG\Definition(
 *      definition="Persona",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="apellido",
 *          description="apellido",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tipo_documento",
 *          description="tipo_documento",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="documento",
 *          description="documento",
 *          type="string"
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
class Persona extends Model
{
    use SoftDeletes;

    public $table = 'persona';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'apellido',
        'tipo_documento',
        'documento',
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
        'nombre' => 'string',
        'apellido' => 'string',
        'tipo_documento' => 'string',
        'documento' => 'string',
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
        'nombre' => 'required|max:100',
        'apellido' => 'required|max:100',
        'tipo_documento' => 'required',
        'documento' => 'required|unique:persona|max:50|regex:[[0-9]+]',
        'ciudad_id' => 'required',
        'direccion' => 'required|max:255',
        'telefono' => 'required|max:20|regex:[[0-9]+]'
    ];

    /**
     * Especifica y construye el contrario de la relacion uno a muchos con el modelo City
     *
     * @return relationship
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'ciudad_id', 'id');
    }

    /**
     * Especifica la relacion muchos a muchos con el modelo Tercero
     *
     */
    public function terceros()
    {
        return $this->belongsToMany(Tercero::class, 'tercero_persona'/*, 'id', 'persona_id'*/);
    }
}
