<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="movimiento_contable",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="trs_id",
 *          description="trs_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="suc_id",
 *          description="suc_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="cntaux_id",
 *          description="cntaux_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="debe",
 *          description="debe",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="haber",
 *          description="haber",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="detalle",
 *          description="detalle",
 *          type="string"
 *      )
 * )
 */
class movimiento_contable extends Model
{
    use SoftDeletes;

    public $table = 'movimiento_contable';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'trs_id',
        'suc_id',
        'cntaux_id',
        'debe',
        'haber',
        'detalle'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'trs_id' => 'integer',
        'suc_id' => 'integer',
        'cntaux_id' => 'integer',
        'debe' => 'float',
        'haber' => 'float',
        'detalle' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
        'trs_id' => 'required|integer',
        'suc_id' => 'required|integer',
        'cntaux_id' => 'required|integer',
        'debe' => 'required|numeric',
        'haber' => 'required|numeric',
        'detalle' => 'required'
    ];


    // cada movimiento_contable tiene una transacciones
    public function transaccion() {
        return $this->belongsTo('App\Models\Admin\transaccion','trs_id','id');
    }

    // cada movimiento_contable tiene una Sucursal
    public function Sucursal() {
        return $this->belongsTo('App\Models\Sucursal','suc_id','id');
    }

    // cada movimiento_contable tiene una pc_cuentaauxiliar
    public function pc_cuentaauxiliar() {
        return $this->belongsTo('App\Models\Admin\Pc\pc_cuentaauxiliar','cntaux_id','id');
    }

    /**
     * many-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function tercero()
    {
        return $this->belongsToMany('App\Models\Tercero', 'movimiento_contable_tercero', 'movimiento_contable_id', 'tercero_id');
    }

    /**
     * many-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function activo_fijo()
    {
        return $this->belongsToMany('App\Models\Admin\activo_fijo', 'movimiento_contable_activo_fijo', 'movimiento_contable_id', 'activo_fijo_id');
    }

    //recibe los parametros del where
    //ejemplo ->CodigoNombre('name'.'='.'pepe')
    public function scopeMovimientos($query, $condicion)
    {
        //de esta manera se obtienen como tipo json para llenar los registros con jquery
        return $query->whereRaw($condicion)->orderBy('id', 'asc')->get();
    }
}
