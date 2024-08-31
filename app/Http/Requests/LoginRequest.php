<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'usuario' => 'email',
            'senha' => 'required | min:5',
        ];
    }

    public function messages(): array
    {
        return [
            'usuario.email' => 'O campo Login (email) é Obrigatório',
            'senha.min' => 'O campo senha deve conter no mínimo 5 carácteres',
            'senha.required' => 'O campo senha é obrigatório',
        ];
    }

}
