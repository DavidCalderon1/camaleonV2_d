<?php

namespace App\Http\Requests\Admin\Pc;

use App\Http\Requests\Request;
use App\Models\Admin\Pc\pc_grupo;

class Updatepc_grupoRequest extends Request
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
			'clase_id' => 'required|integer',
			'codigo' => 'required|min:10|max:99|integer',
			'nombre' => 'required|max:255',
			'descripcion' => 'required',
			'ajuste' => 'required|max:10',
            'tipo' => 'required|max:10',
        ];
    }
}
