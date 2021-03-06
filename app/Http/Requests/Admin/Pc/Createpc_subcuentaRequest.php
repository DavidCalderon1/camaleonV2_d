<?php

namespace App\Http\Requests\Admin\Pc;

use App\Http\Requests\Request;
use App\Models\Admin\Pc\pc_subcuenta;

class Createpc_subcuentaRequest extends Request
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
        return pc_subcuenta::$rules;
    }
}
