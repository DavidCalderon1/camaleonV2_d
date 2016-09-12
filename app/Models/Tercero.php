<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Persona;
use App\Models\Empresa;
use DB;

/**
 * @SWG\Definition(
 *      definition="Tercero",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tipo",
 *          description="tipo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="regimen",
 *          description="regimen",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="gran_contribuyente",
 *          description="gran_contribuyente",
 *          type="boolean"
 *      )
 * )
 */
class Tercero extends Model
{
    use SoftDeletes;

    public $table = 'tercero';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'tipo',
        'regimen',
        'gran_contribuyente',
        'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo' => 'string',
        'regimen' => 'string',
        'gran_contribuyente' => 'boolean',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo' => 'required',
        'regimen' => 'required',
        'gran_contribuyente' => 'required'
        
    ];

    /**
     * Especifica la relacion muchos a muchos con el modelo Persona
     *
     */
    public function personas()
    {
        return $this->belongsToMany(Persona::class, 'tercero_persona'/*, 'id', 'tercero_id'*/);
    }

    /**
     * Especifica la relacion muchos a muchos con el modelo Empresa
     *
     */
    public function empresas()
    {
        return $this->belongsToMany(Empresa::class, 'tercero_empresa'/*, 'id', 'tercero_id'*/);
    }

    /**
     * many-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function movimiento_contable()
    {
        return $this->belongsToMany('App\Models\Admin\movimiento_contable', 'movimiento_contable_tercero', 'tercero_id', 'movimiento_contable_id');
    }


    /**
     * many-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function scopeListaTerceros($query)
    {
        //de esta manera se obtienen como tipo json para llenar los registros con jquery
        return $query->select(DB::raw("CONCAT(tercero.tipo, ' - ', empresa.razon_social, persona.nombre, ' ', persona.apellido) as nombre, tercero.id as id"))
                ->leftJoin('tercero_persona', 'tercero.id', '=', 'tercero_persona.tercero_id')
                ->leftJoin('persona','tercero_persona.persona_id', '=', 'persona.id')
                ->leftJoin('tercero_empresa', 'tercero.id', '=', 'tercero_empresa.tercero_id')
                ->leftJoin('empresa','tercero_empresa.empresa_id', '=', 'empresa.id')
                ->whereNull('tercero.deleted_at')->whereNull('persona.deleted_at')
                ->whereNull('empresa.deleted_at')
                ->orderBy('tercero.id', 'asc');
    }
}
