<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\State;

/**
 * @SWG\Definition(
 *      definition="Country",
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
 *      )
 * )
 */
class Country extends Model
{
    use SoftDeletes;

    public $table = 'pais';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'codigo_ref',
        'nativo'/*,
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
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|max:50',
        'codigo_ref' => 'required|max:10|regex:[[0-9]+]'   
    ];

    /**
     * Especifica y construye la relacion uno a muchos con el modelo State
     *
     * @return relationship
     */
    public function states()
    {
        return $this->hasMany(State::class, 'pais_id', 'id');
    }
}
