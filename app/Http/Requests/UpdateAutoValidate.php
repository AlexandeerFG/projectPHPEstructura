<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAutoValidate extends FormRequest
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
            'id_auto'           => ['integer', 'required'],
            'modelo'            => ['string','required'],
            'color'             => ['string', 'required'],
            'marca'             => ['string', 'required'],
        ];
    }

    public function messages()
    {
        return [
            'id_auto.integer'         => 'El id_auto debe de ser un número entero',
            'id_auto.required'        => 'El id_auto debe de ser un número entero',
            'modelo.string'           => 'El modelo debe de ser una cadena de caracteres',
            'color.string'            => 'El color debe de ser una cadena de caracteres',
            'marca.string'            => 'El apellido materno debe de ser una cadena de caracteres',
        ];
    }
}
