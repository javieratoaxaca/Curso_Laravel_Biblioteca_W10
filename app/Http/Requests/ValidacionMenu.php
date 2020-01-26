<?php

namespace App\Http\Requests;

use App\Rules\ValidarCampoUrl;
use Illuminate\Foundation\Http\FormRequest;

class ValidacionMenu extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Se modifica esta funcion para que realice la autorizacion de las reglas que pongamos para nuestro formularios
        //return false; //opcion por default
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //aqui a traves de un array se va asignar los campos que deberan tener las reglas
        return [
            'nombre'=>'required|max:50|unique:menu,nombre,'.$this->route('id'),
            //Aqui pondremos una regla para la validacion de campo como si fuera un array para que esta regla la aplique desde la clase de ValidarCampoUrl
            'url'=>['required','max:50',new ValidarCampoUrl],
            'icono'=>'nullable|max:50'
        ];
    }
    //creamos una funcion propia de laravel para enviar los mensajes que mostrara en pantalla de los campos que no se estan rellenando
    //public function messages()
    /*{
        return [
            'nombre.required'=>'EL campo nombre es requerido',
            'url.required'=>'El campo url es requerido'
        ];
    }*/
}
