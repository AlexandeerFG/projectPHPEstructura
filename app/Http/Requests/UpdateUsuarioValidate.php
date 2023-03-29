<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'id'                => ['integer', 'required'],
            'nombre'            => ['string','required'],
            'apellidoPaterno'   => ['string', 'required'],
            'apellidoMaterno'   => ['string', 'required'],
            'telefono'          => ['integer', 'nullable'],
            'correo'            => ['email', 'unique:table_usuarios,correo']
        ];
    }

    public function messages(){
        return [
            'id.integer'               => 'El campo id debe de ser un número entero',
            'nombre.string'           => 'El nombre debe de ser una cadena de caracteres',
            'apellidoPaterno.string'  => 'El apellido paterno debe de ser una cadena de caracteres',
            'apellidoMaterno.string'  => 'El apellido materno debe de ser una cadena de caracteres',
            'telefono.integer'        => 'El telefono debe de ser un número',
            'correo.email'            => 'El correo debe tener un formato valido',
        ];
    }
}
