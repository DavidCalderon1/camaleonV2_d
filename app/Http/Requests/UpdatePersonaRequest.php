<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Persona;

class UpdatePersonaRequest extends Request
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
    public function rules($id_persona)
    {
        $rules = [
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'tipo_documento' => 'required',
            'documento' => 'required|max:50|regex:[[0-9]+]|unique:persona,documento,' . $id_persona,
            'ciudad_id' => 'required',
            'direccion' => 'required|max:255',
            'telefono' => 'required|max:20|regex:[[0-9]+]'
        ];
        return $rules;
    }
}
