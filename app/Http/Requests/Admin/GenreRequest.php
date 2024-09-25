<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
{
    /**
     * Determine se o usuário está autorizado a fazer esta solicitação.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->user_type === 'admin';
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:genres,name',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome do gênero é obrigatório.',
            'name.string' => 'O nome do gênero deve ser uma string.',
            'name.max' => 'O nome do gênero não pode exceder 255 caracteres.',
            'name.unique' => 'Este gênero já existe.',
        ];
    }
}
