<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Empresa;

class UpdateEmpresaRequest extends Request
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
    public function rules($id_empresa)
    {
        $rules = [
        'razon_social' => 'required|max:100',
        'naturaleza' => 'required',
        'fecha_constitucion' => 'required',
        'nit' => 'required|max:50|regex:/^[a-zA-Z0-9_]+$/|unique:empresa,nit,' . $id_empresa,
        'ciudad_id' => 'required',
        'direccion' => 'required|max:255',
        'telefono' => 'required|max:20|regex:[[0-9]+]'
        ];
        return $rules;
    }
}
