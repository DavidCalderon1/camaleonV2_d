<?php

namespace App\Http\Requests\Admin\Pc;

use App\Http\Requests\Request;
use App\Models\Admin\Pc\pc_cuentaauxiliar;

class Updatepc_cuentaauxiliarRequest extends Request
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
        return [
			'subcuenta_id' => 'required|integer',
			'codigo' => 'required|min:10000000|max:9999999999|integer',
			'nombre' => 'required|max:255',
			'descripcion' => 'required',
			'ajuste' => 'required|max:10',
			'tercero_activo' => 'required|boolean',
			'estado' => 'required|boolean',
            'tipo' => 'required|max:10',
        ];
    }
}
