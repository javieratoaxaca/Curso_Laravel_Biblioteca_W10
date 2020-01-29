<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionRol extends FormRequest
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
            'nombre'=>'required|max:50|unique:rol,nombre,'.$this->route('id'),
            //Aqui pondremos una regla para la validacion de campo como si fuera un array para que esta regla la aplique desde la clase de ValidarCampoUrl
            /* 'url'=>['required','max:50',new ValidarCampoUrl],
            'icono'=>'nullable|max:50' */
        ];
    }
}
