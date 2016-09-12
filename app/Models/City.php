<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\State;
use App\Models\Sucursal;
use App\Models\Persona;
use App\Models\Empresa;

/**
 * @SWG\Definition(
 *      definition="City",
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
 *          property="codigo_ref",
 *          description="codigo_ref",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nativo",
 *          description="nativo",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="departamento_id",
 *          description="departamento_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class City extends Model
{
    use SoftDeletes;

    public $table = 'ciudad';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'codigo_ref',
        'nativo',
        'departamento_id'/*,
        'deleted_at'*/
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'codigo_ref' => 'string',
        'nativo' => 'boolean',
        'departamento_id' => 'integer',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|max:50',
        'codigo_ref' => 'required|max:10|regex:[[0-9]+]',
        'departamento_id' => 'required' 
    ];

    /**
     * Especifica el contrario de la relacion uno a muchos con el modelo State
     *
     * @return relationship return
     */
    public function state()
    {
        return $this->belongsTo(State::class, 'departamento_id', 'id');
    }

    /**
     * Especifica la relacion uno a muchos con el modelo Sucursal
     *
     * @return relationship return
     */
    public function sucursales()
    {
        return $this->hasMany(Sucursal::class, 'ciudad_id', 'id');
    }

    /**
     * Especifica la relacion uno a muchos con el modelo Persona
     *
     * @return relationship return
     */
    public function personas()
    {
        return $this->hasMany(Persona::class, 'ciudad_id', 'id');
    }

    /**
     * Especifica la relacion uno a muchos con el modelo Empresa
     *
     * @return relationship return
     */
    public function empresas()
    {
        return $this->hasMany(Empresa::class, 'ciudad_id', 'id');
    }
}
