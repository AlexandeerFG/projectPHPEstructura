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
            'id'                => ['exists:table_usuarios,id'],
            'nombre'            => ['string','required'],
            'apellidoPaterno'   => ['string', 'required'],
            'apellidoMaterno'   => ['string', 'required'],
            'telefono'          => ['integer', 'nullable'],
            'correo'            => ['email', 'unique:table_usuarios,correo']
        ];
    }
}
