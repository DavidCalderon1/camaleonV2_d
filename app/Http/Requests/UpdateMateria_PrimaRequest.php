<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Materia_Prima;

class UpdateMateria_PrimaRequest extends Request
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
    public static function rules($id)
    {
        $rules = [
            'codigo' => 'required|max:20|regex:[[0-9]+]|unique:materia_prima,codigo,' . $id,
            'nombre' => 'required|max:140',
            'caracteristicas' => 'required',
            'unidad_medida' => 'required|max:100',
            'tercero_id' => 'required'
        ];
        return $rules;
    }
}
