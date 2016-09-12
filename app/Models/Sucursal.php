<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\City;

/**
 * @SWG\Definition(
 *      definition="Sucursal",
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
class Sucursal extends Model
{
    use SoftDeletes;

    public $table = 'sucursal';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'ciudad_id',
        'direccion',
        'telefono'/*,
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
        'nombre' => 'required|max:255',
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

    // cada Sucursal tiene muchos movimientos contables
    public function movimiento_contable() {
        return $this->hasMany('App\Models\Admin\movimiento_contable','suc_id','id');
    }
}
