<?php

namespace App\Http\Requests\Admin\Pc;

use App\Http\Requests\Request;
use App\Models\Admin\Pc\pc_clase;

class Updatepc_claseRequest extends Request
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
			'codigo' => 'required|min:1|max:9|integer',
			'nombre' => 'required|max:255',
			'descripcion' => 'required',
			'ajuste' => 'required|max:10',
            'naturaleza' => 'required|max:10',
			'tipo' => 'required|max:10',
        ];
    }
}
