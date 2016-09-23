<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tercero;

/**
 * @SWG\Definition(
 *      definition="Materia_Prima",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="codigo",
 *          description="codigo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="caracteristicas",
 *          description="caracteristicas",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="unidad_medida",
 *          description="unidad_medida",
 *          type="string"
 *      )
 * )
 */
class Materia_Prima extends Model
{
    use SoftDeletes;

    public $table = 'materia_prima';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'codigo',
        'nombre',
        'caracteristicas',
        'unidad_medida',
        'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'codigo' => 'string',
        'nombre' => 'string',
        'caracteristicas' => 'string',
        'unidad_medida' => 'string',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'codigo' => 'required|unique:materia_prima|max:20|regex:[[0-9]+]',
        'nombre' => 'required|max:140',
        'caracteristicas' => 'required',
        'unidad_medida' => 'required|max:100',
        'tercero_id' => 'required'
    ];

    /**
     * Especifica la relacion muchos a muchos con el modelo Tercero
     *
     */
    public function terceros()
    {
        return $this->belongsToMany(Tercero::class, 'materiaPrima_proveedor', 'materiaPrima_id', 'tercero_id');
    }
}
