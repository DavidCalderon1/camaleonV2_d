<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

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
        'detalle',
        'auto'
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
        'detalle' => 'string',
        'auto' => 'boolean'
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
        'detalle' => 'required',
        'auto' => 'boolean'
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

    /**
     * @param $id, $trs_id
     * @return mixed
     */
    public function scopeBuscar($query, $id, $trs_id)
    {
        //obtiene el movimiento perteneciente a la transaccion a partir del id que esta en la url
        return $query->where('id', $id)->where('trs_id', $trs_id);
    }

    /**
     * @param $transaccion
     * @return mixed
     */
    public function scopeTodos($query, $trs_id)
    {
        //obtiene el movimiento perteneciente a la transaccion a partir del id que esta en la url
        return $query->where('trs_id', $trs_id);
    }
	
	
    /**
     * many-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function scopeListaMovimientos($query, $trs_id, $id = '', $campos = '', $condiciones = [], $order_by = '')
    {
        
        if ($campos != '') {
            $query = $query->select( DB::raw(htmlentities($campos) ) );
        }else{
            $query = $query->select( DB::raw("CONCAT(trs.id, ' - ', trs.fecha, ' - ', tipodoc_contable.descripcion) as tipo_transaccion"), 'trs.id as id_transaccion', 'trs.auto as auto_transaccion', 'movimiento_contable.*', 'suc.id AS id_sucursal', 'suc.nombre AS nombre_sucursal', 'tercero.id AS id_tercero', DB::raw("CONCAT(empresa.razon_social, persona.nombre, ' ', persona.apellido) AS nombre_tercero, CONCAT(empresa.nit, persona.documento) AS numero_tercero"),'af.id AS id_activo_fijo', 'af.marca AS marca_activo_fijo', 'af.modelo AS modelo_activo_fijo', 'cntaux.codigo AS codigo_cntaux', 'cntaux.nombre AS nombre_cntaux');
        }

        //de esta manera se obtienen como tipo json para llenar los registros con jquery
        $query = $query->leftJoin('transaccion AS trs', 'movimiento_contable.trs_id', '=', 'trs.id')
                ->leftJoin('tipodoc_contable', 'trs.tdc_id', '=', 'tipodoc_contable.id')
                ->leftJoin('sucursal AS suc', 'movimiento_contable.suc_id', '=', 'suc.id')
                ->leftJoin('movimiento_contable_activo_fijo AS mcaf', 'movimiento_contable.id', '=', 'mcaf.movimiento_contable_id')
                ->leftJoin('activo_fijo AS af','mcaf.activo_fijo_id', '=', 'af.id')
                ->leftJoin('movimiento_contable_tercero AS mct', 'movimiento_contable.id', '=', 'mct.movimiento_contable_id')
                ->leftJoin('tercero','mct.tercero_id', '=', 'tercero.id')
                ->leftJoin('tercero_persona', 'tercero.id', '=', 'tercero_persona.tercero_id')
                ->leftJoin('persona','tercero_persona.persona_id', '=', 'persona.id')
                ->leftJoin('tercero_empresa', 'tercero.id', '=', 'tercero_empresa.tercero_id')
                ->leftJoin('empresa','tercero_empresa.empresa_id', '=', 'empresa.id')
                ->leftJoin('pc_cuentaauxiliar AS cntaux','movimiento_contable.cntaux_id', '=', 'cntaux.id')
                ->where('movimiento_contable.trs_id',$trs_id)
                ->whereNull('af.deleted_at')->whereNull('tercero.deleted_at')
                ->whereNull('persona.deleted_at')->whereNull('empresa.deleted_at');
                

        if ($id != '') {
            $query = $query->where('movimiento_contable.id',$id);
        }
        if ( count($condiciones) != 0 ) {
            $query = $query->where(DB::raw($condiciones[0]), $condiciones[1], $condiciones[2]);
        }
        if ($order_by != '') {
            $query = $query->orderBy($order_by, 'asc');
        }else{
            $query = $query->orderBy('movimiento_contable.id', 'asc');
        }

		return $query;
    }
}
