<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use App\Models\Admin\movimiento_contable;

class Createmovimiento_contableRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if( Request::get('debe') != '0' && Request::get('haber') != '0' )
        {
            return [
                'debe' => 'max:0'
            ];
        }else{
            return movimiento_contable::$rules;
        }
    }
}
