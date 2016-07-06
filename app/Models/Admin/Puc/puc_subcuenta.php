<?php

namespace App\Models\Admin\Puc;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

/**
 * @SWG\Definition(
 *      definition="puc_subcuenta",
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
 *          property="nativa",
 *          description="nativa",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="cuenta_id",
 *          description="cuenta_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class puc_subcuenta extends Model
{
    use SoftDeletes;

    public $table = 'puc_subcuenta';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'cuenta_id',
        'codigo',
        'nombre',
        'descripcion',
        'ajuste',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cuenta_id' => 'integer',
        'codigo' => 'string',
        'nombre' => 'string',
        'descripcion' => 'string',
        'ajuste' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cuenta_id' => 'required|integer',
		'codigo' => 'required|unique:puc_subcuenta|min:100000|max:999999|integer',
		'nombre' => 'required|max:255',
		'descripcion' => 'required',
		'ajuste' => 'required|max:10',
    ];

    // cada subcuenta tiene una cuenta
    public function cuentas() {
        return $this->belongsTo('App\Models\Admin\Puc\puc_cuenta','cuenta_id','id');
    }

    // cada subcuenta tiene muchas cuentas auxiliares
    public function cuentasauxiliares() {
        return $this->hasMany('App\Models\Admin\Puc\puc_cuentaauxiliar','subcuenta_id','id');
    }
    
    //recibe los parametros del where
    //ejemplo ->CodigoNombre('name'.'='.'pepe')
    public function scopeCodigoNombre($query, $condicion)
    {
        //de esta manera se obtienen como tipo json para llenar los registros con jquery
        return $query->select(DB::raw("CONCAT(codigo, ' - ', nombre) as nombre"), "id")->whereRaw($condicion)->orderBy('id', 'asc')->get();
    }
}
