<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioAutoValidate extends FormRequest
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
            'id_usuario_auto'   => ['integer', 'required', 'exists:table_usuario_autos,id_usuario_auto'],
            'id_auto'           => ['integer', 'required', 'exists:table_autos,id_auto'],
            'id_usuario'        => ['integer', 'required', 'exists:table_usuarios,id'],
        ];
    }

    public function messages(){
        return [
            'id_usuario_auto.integer'  => 'El id usuario auto debe de ser un número entero',
            'id_usuario_auto.required' => 'El id usuario auto es requerido',
            'id_usuario_auto.exists'   => 'El id usuario auto ingresado no existe en la base de datos',
            'id_auto.integer'          => 'El id auto debe de ser un número entero',
            'id_auto.required'         => 'El id auto es requerido',
            'id_auto.exists'           => 'El id auto ingresado no existe en la base de datos',
            'id_usuario.integer'       => 'El id usuario debe de ser un número entero',
            'id_usuario.required'      => 'El id usuario es requerido',
            'id_usuario.exists'        => 'El id usuario ingresado no existe en la base de datos',
        ];
    }
}
