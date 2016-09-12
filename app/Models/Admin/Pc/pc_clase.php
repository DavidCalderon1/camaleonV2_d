<?php

namespace App\Models\Admin\Pc;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

/**
 * @SWG\Definition(
 *      definition="pc_clase",
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
 *          property="naturaleza",
 *          description="naturaleza",
 *          type="string"
 *      )
 * )
 */
class pc_clase extends Model
{
    use SoftDeletes;

    public $table = 'pc_clase';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'ajuste',
        'naturaleza',
        'tipo',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'codigo' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
        'ajuste' => 'string',
        'naturaleza' => 'string',
        'tipo' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'codigo' => 'required|unique:pc_clase|min:1|max:9|integer',
        'codigo' => 'required|min:1|max:9|integer',
        'nombre' => 'required|max:255',
        'descripcion' => 'required',
        'ajuste' => 'required|max:10',
        'naturaleza' => 'required|max:10',
        'tipo' => 'required|max:10',
    ];

    // cada clase tiene muchos grupos
    public function grupos() {
        return $this->hasMany('App\Models\Admin\Pc\pc_grupo','clase_id','id');
    }
    
    //recibe los parametros del where
    //ejemplo ->CodigoNombre('name','=','pepe')
    public function scopeCodigoNombre($query, $condicion)
    {
        //de esta manera se obtienen para llenar los registros con blade
        //return $query->select(DB::raw("CONCAT(codigo, ' - ', nombre) as nombre"), "id")->whereRaw($condicion)->orderBy('id', 'asc')->lists('nombre','id');

        //de esta manera se obtienen como tipo json para llenar los registros con jquery
        return $query->select(DB::raw("CONCAT(codigo, ' - ', nombre, ' - ', tipo) as nombre, id"))->whereRaw($condicion)->orderBy('id', 'asc')->get();
    }
    /*
    public function scopeTipoCuenta($query, $tipo){
        $tipos = config('options.pc_types');
        if( $tipo != "" && isset($tipos[$tipo]) ){
            $query->where('tipo','=',$tipo);
        }
    }
    */

}
