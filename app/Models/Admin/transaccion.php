<?php

namespace App\Models\Admin;

use DB;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="transaccion",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="fecha",
 *          description="fecha",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="tdc_id",
 *          description="tdc_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="descripcion",
 *          description="descripcion",
 *          type="string"
 *      )
 * )
 */
class transaccion extends Model
{
    use SoftDeletes;

    public $table = 'transaccion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'fecha',
        'tdc_id',
        'descripcion',
        'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tdc_id' => 'integer',
        'descripcion' => 'string',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha' => 'required|date',
        'tdc_id' => 'required|integer',
        'descripcion' => 'required'
    ];


    // cada transaccion tiene un Tipodoc_contable
    public function Tipodoc_contable() {
        return $this->belongsTo('App\Models\Admin\Tipodoc_contable','tdc_id','id');
    }

    // cada transaccion tiene muchos movimientos contables
    public function movimiento_contable() {
        return $this->hasMany('App\Models\Admin\movimiento_contable','trs_id','id');
    }

    //realiza el join y devuelve el query
    public function scopeIdFechaTipo($query)
    {
        $query->join('tipodoc_contable', 'transaccion.tdc_id', '=', 'tipodoc_contable.id')
            ->select(DB::raw("CONCAT(transaccion.id, ' - ', transaccion.fecha, ' - ', tipodoc_contable.descripcion) as tipo, transaccion.id as id"))
            ->orderBy('transaccion.id', 'asc');
        return $query;
    }
}
