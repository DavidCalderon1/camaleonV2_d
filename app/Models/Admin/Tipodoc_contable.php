<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipodoc_contable extends Model
{
    use SoftDeletes;

    public $table = 'tipodoc_contable';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'sigla',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sigla' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sigla' => 'required|max:4',
        'descripcion' => 'required|max:100'
    ];


    // cada Tipodoc_contable tiene muchas transacciones
    public function transaccion() {
        return $this->hasMany('App\Models\Admin\transaccion','tdc_id','id');
    }
}
