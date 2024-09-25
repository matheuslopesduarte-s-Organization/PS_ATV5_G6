<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use App\Rules\CPFValidRule;

class RegisterRequest extends FormRequest
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
            'nome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', new CPFValidRule, 'unique:users,cpf'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'senha' => ['required', 'confirmed', Rules\Password::defaults()],
            'dataNascimento' => ['required', 'date'],
            'cpfResp' => ['nullable', new CPFValidRule], 
        ];
    }

    public function messages(): array
    {
        return [
            'cpf.required' => 'O CPF é obrigatório.',
            'cpfResp.required' => 'O CPF do responsável é obrigatório para menores de 18 anos.',
        ];
    }
}
