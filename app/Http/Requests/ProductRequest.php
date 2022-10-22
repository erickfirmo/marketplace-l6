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
            'name' => 'required',
            'description' => 'required|min:30|max:255',
            'body' => 'required',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Campo :attribute é obrigatório',
            'min'=> 'Campo :attribute deve ter no mínimo :min caracteres',
            'max'=> 'Campo :attribute deve ter no máximo :max caracteres',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'description' => 'descrição',
            'body' => 'conteúdo',
            'price' => 'preço',
        ];
    }
}
