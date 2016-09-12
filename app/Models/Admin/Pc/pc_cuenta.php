<?php

namespace App\Models\Admin\Pc;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

/**
 * @SWG\Definition(
 *      definition="pc_cuenta",
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
 *          property="grupo_id",
 *          description="grupo_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class pc_cuenta extends Model
{
    use SoftDeletes;

    public $table = 'pc_cuenta';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'grupo_id',
        'codigo',
        'nombre',
        'descripcion',
        'tipo',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'grupo_id' => 'integer',
        'codigo' => 'string',
        'nombre' => 'string',
        'descripcion' => 'string',
        'ajuste' => 'string',
        'tipo' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'grupo_id' => 'required|integer',
		'codigo' => 'required|min:1000|max:9999|integer',
		'nombre' => 'required|max:255',
		'descripcion' => 'required',
        'ajuste' => 'required|max:10',
		'tipo' => 'required|max:10',
    ];

    // cada cuenta tiene un grupo
    public function grupos() {
        return $this->belongsTo('App\Models\Admin\Pc\pc_grupo','grupo_id','id');
    }

    // cada cuenta tiene muchas subcuentas
    public function subcuentas() {
        return $this->hasMany('App\Models\Admin\Pc\pc_subcuenta','cuenta_id','id');
    }
    
    //recibe los parametros del where
    //ejemplo ->CodigoNombre('name'.'='.'pepe')
    public function scopeCodigoNombre($query, $condicion)
    {
        //de esta manera se obtienen como tipo json para llenar los registros con jquery
        return $query->select(DB::raw("CONCAT(codigo, ' - ', nombre, ' - ', tipo) as nombre"), "id")->whereRaw($condicion)->orderBy('id', 'asc')->get();
    }
}
