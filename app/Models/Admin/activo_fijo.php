<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

/**
 * @SWG\Definition(
 *      definition="activo_fijo",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="cuenta_aux_id",
 *          description="cuenta_aux_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="descripcion",
 *          description="descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="marca",
 *          description="marca",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="modelo",
 *          description="modelo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="fecha_adquisicion",
 *          description="fecha_adquisicion",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="valor_compra",
 *          description="valor_compra",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="cantidad",
 *          description="cantidad",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class activo_fijo extends Model
{
    use SoftDeletes;

    public $table = 'activo_fijo';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'cuenta_aux_id',
        'descripcion',
        'marca',
        'modelo',
        'fecha_adquisicion',
        'valor_compra',
        'cantidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cuenta_aux_id' => 'integer',
        'descripcion' => 'string',
        'marca' => 'string',
        'modelo' => 'string',
        'valor_compra' => 'integer',
        'cantidad' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cuenta_aux_id' => 'integer|required',
        'descripcion' => 'string|required',
        'marca' => 'string|required',
        'modelo' => 'string|required',
        'fecha_adquisicion' => 'date|required',
        'valor_compra' => 'integer|required',
        'cantidad' => 'integer|required',
    ];



    /**
     * many-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function movimiento_contable()
    {
        return $this->belongsToMany('App\Models\Admin\movimiento_contable', 'movimiento_contable_activo_fijo', 'activo_fijo_id', 'movimiento_contable_id');
    }

    /**
     * many-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function scopeListaActivosFijos($query)
    {
        //de esta manera se obtienen como tipo json para llenar los registros con jquery
        return $query->select(DB::raw("CONCAT(marca, ' - ', modelo) as nombre, id"))->orderBy('id', 'asc');
    }
}
