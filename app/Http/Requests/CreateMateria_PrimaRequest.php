<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Materia_Prima;

class CreateMateria_PrimaRequest extends Request
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
        return Materia_Prima::$rules;
    }
}
