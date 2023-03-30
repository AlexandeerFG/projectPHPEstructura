<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteUsuarioAutoValidate extends FormRequest
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
            'id_usuario_auto' => ['integer', 'required', 'exists:table_usuario_autos,id_usuario_auto']
        ];
    }

    public function messages(){
        return [
            'id_usuario_auto.exists' => 'El id usuario auto ingresado no existe en la base de datos',
        ];
    }
}
