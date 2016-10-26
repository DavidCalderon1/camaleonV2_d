<?php

namespace App\Models\Admin\Pc;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

/**
 * @SWG\Definition(
 *      definition="pc_cuentaauxiliar",
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
 *          property="descripcion",
 *          description="descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ajuste",
 *          description="ajuste",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tercero_activo",
 *          description="tercero_activo",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="estado",
 *          description="estado",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="subcuenta_id",
 *          description="subcuenta_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class pc_cuentaauxiliar extends Model
{
    use SoftDeletes;

    public $table = 'pc_cuentaauxiliar';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'subcuenta_id',
        'codigo',
        'nombre',
        'descripcion',
        'ajuste',
        'tercero_activo',
        'estado',
        'tipo',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'subcuenta_id' => 'integer',
        'codigo' => 'string',
        'nombre' => 'string',
        'descripcion' => 'string',
        'ajuste' => 'string',
        'tercero_activo' => 'boolean',
        'estado' => 'boolean',
        'tipo' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'subcuenta_id' => 'required|integer',
		'codigo' => 'required|min:10000000|max:9999999999|integer',
		'nombre' => 'required|max:255',
		'descripcion' => 'required',
		'ajuste' => 'required|max:10',
		'tercero_activo' => 'required|boolean',
        'estado' => 'required|boolean',
		'tipo' => 'required|max:10',
    ];

    // cada cuenta auxiliar tiene una subcuenta
    public function subcuentas() {
        return $this->belongsTo('App\Models\Admin\Pc\pc_subcuenta','subcuenta_id','id');
    }

    // cada cuenta auxiliar tiene muchos movimientos contables
    public function movimiento_contable() {
        return $this->hasMany('App\Models\Admin\movimiento_contable','cntaux_id','id');
    }

    //recibe los parametros del where
    //ejemplo ->CodigoNombre('name'.'='.'pepe')
    public function scopeCodigoNombre($query, $condicion)
    {
        //de esta manera se obtienen como tipo json para llenar los registros con jquery
        return $query->select(DB::raw("CONCAT(codigo, ' - ', nombre, ' - ', tipo) as nombre"), "id")->whereRaw($condicion)->orderBy('id', 'asc')->get();
    }

    //añade condiciones en el where
    public function scopeTerceroActivo($query)
    {
        //de esta manera se obtienen como tipo json para llenar los registros con jquery
        return $query->where('tercero_activo', true )->where('estado', true );
    }
}
