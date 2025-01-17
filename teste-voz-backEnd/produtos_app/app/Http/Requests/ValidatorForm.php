<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatorForm extends FormRequest
{
    // protected $redirect = 'api/adm/produtos/cadastrar';
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
            'nome' => 'required|min:5|max:40',
            'descricao' => 'min:5|max:150',
            'preco' => 'required',
            'categoria_id' => 'required'
        ];
    }

    public function messages()
    {
        return [

            'required' => 'o campo :attribute não pode estar vazio.',
            'min' => 'o campo :attribute aceita no mínimo 5 caracteres.',
            'nome.max' => 'o campo nome aceita no máximo 40 caracteres.',
            'descricao.max' => 'o campo descrição aceita no máximo 150 caracteres.'
        ];
    }
}
