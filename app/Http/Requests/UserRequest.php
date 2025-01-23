<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class UserRequest extends FormRequest
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
        $userId = $this->route('user');
        return [
            'name'=> 'required',
            'email' => 'required|email|unique:users,email,' . ($userId ? $userId->id : null),
            'password' =>'required|min:6',
        ];
    }

    public function messages(): array{
        return[
            'name.required' => 'Campo nome é Obrigatório!',
            'email.required' => 'Campo email é Obrigatório!',
            'email.email' => 'Necessário enviar email válido!',
            'email.unique' => 'O e-mail já está cadastrado!',
            'password.required' => 'Campo senha é Obrigatório!',
            'password.min' => 'Senha no mínino :min caracteres!',
        ];
    }
}
