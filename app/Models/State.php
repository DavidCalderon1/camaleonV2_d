<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Country;
use App\Models\City;

/**
 * @SWG\Definition(
 *      definition="State",
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
 *          property="pais_id",
 *          description="pais_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class State extends Model
{
    use SoftDeletes;

    public $table = 'departamento';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'codigo_ref',
        'nativo',
        'pais_id'/*,
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
        'pais_id' => 'integer',
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
        'pais_id' => 'required'
    ];

    /**
     * Especifica el contrario de la relacion uno a muchos con el modelo Country
     *
     * @return relationship return
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'pais_id', 'id');
    }

    /**
     * Especifica y construye la relacion uno a muchos con el modelo City
     *
     * @return relationship
     */
    public function cities()
    {
        return $this->hasMany(City::class, 'departamento_id', 'id');
    }
}
