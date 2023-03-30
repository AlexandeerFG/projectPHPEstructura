<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUsuarioAutoValidate extends FormRequest
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
            'id_auto'     => ['integer', 'required', 'exists:table_autos,id_auto'],
            'id_usuario'  => ['integer', 'required', 'exists:table_usuarios,id'],
        ];
    }

    public function messages(){
        return [
            'id_auto.integer'     => 'El id_auto debe de ser un número entero',
            'id_auto.required'    => 'El id_auto es requerido',
            'id_auto.exists'      => 'El id_auto no esta en la base de datos',
            'id_usuario.exists'   => 'El id_usuario no esta en la base de datos',
            'id_usuario.integer'  => 'El id_usuario debe de ser un número entero',
            'id_usuario.required' => 'El id_usuario es requerido',
        ];
    }
}
