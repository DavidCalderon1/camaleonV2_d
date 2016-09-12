<?php

namespace App\Models\Admin\Pc;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

/**
 * @SWG\Definition(
 *      definition="pc_grupo",
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
 *          property="clase_id",
 *          description="clase_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class pc_grupo extends Model
{
    use SoftDeletes;

    public $table = 'pc_grupo';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'clase_id',
        'codigo',
        'nombre',
        'descripcion',
        'ajuste',
        'tipo',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'clase_id' => 'integer',
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
        'clase_id' => 'required|integer',
        'codigo' => 'required|min:10|max:99|integer',
        'nombre' => 'required|max:255',
        'descripcion' => 'required',
        'ajuste' => 'required|max:10',
        'tipo' => 'required|max:10',
    ];

    // cada grupo tiene una clase
    public function clases() {
        return $this->belongsTo('App\Models\Admin\Pc\pc_clase','clase_id','id');
    }

    // cada grupo tiene muchas cuentas
    public function cuentas() {
        return $this->hasMany('App\Models\Admin\Pc\pc_cuenta','grupo_id','id');
    }

    //recibe los parametros del where
    //ejemplo ->CodigoNombre('name'.'='.'pepe')
    public function scopeCodigoNombre($query, $condicion)
    {
        //de esta manera se obtienen para llenar los registros con blade
        //return $query->select(DB::raw("CONCAT(codigo, ' - ', nombre) as nombre"), "id")->whereRaw($condicion)->orderBy('id', 'asc')->lists('nombre','id');

        //de esta manera se obtienen como tipo json para llenar los registros con jquery
        return $query->select(DB::raw("CONCAT(codigo, ' - ', nombre, ' - ', tipo) as nombre"), "id")->whereRaw($condicion)->orderBy('id', 'asc')->get();
    }

}
