<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\BS64ValidRule;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->user_type === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'isbn' => 'required|string|max:13',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:100',
            'classification' => 'required|in:children,teen,adult',
            'synopsis' => 'required|string',
            'cover' => ['required', 'string', new BS64ValidRule],
            'stock' => 'required|integer|min:0',
            'genre_id' => 'required|exists:genres,id',
        ];
    }
    public function messages()
    {
        return [
            'isbn.required' => 'O ISBN é obrigatório.',
            'isbn.exists' => 'O ISBN fornecido não existe.',
            'title.required' => 'O título é obrigatório.',
            'author.required' => 'O autor é obrigatório.',
            'classification.required' => 'A classificação é obrigatória.',
            'synopsis.required' => 'A sinopse é obrigatória.',
            'cover.required' => 'A capa é obrigatória.',
            'cover.string' => 'A capa precisa ser um string base64 válida.',
            'stock.required' => 'O estoque é obrigatório.',
            'genre_id.exists' => 'O gênero selecionado não é válido.',
        ];
    }
}
