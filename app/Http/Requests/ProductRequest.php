<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products,name,' . $this->route('product'),
            'description' => 'required|min:10|max:255',
            'body' => 'required',
            'price' => 'required',
            'categories' => 'nullable',
            'categories.*' => 'required|array',
            'photos.*' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Campo :attribute é obrigatório',
            'min'=> 'Campo :attribute deve ter no mínimo :min caracteres',
            'max'=> 'Campo :attribute deve ter no máximo :max caracteres',
            'unique' => 'Este :attribute já está em uso',
            'image' => 'O arquivo não é uma imagem válida'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'description' => 'descrição',
            'body' => 'conteúdo',
            'price' => 'preço',
            'categories' => 'categorias',
        ];
    }
}
