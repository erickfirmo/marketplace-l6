<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'          => 'required|unique:stores,name,' . $this->route('store'),
            'description'   => 'required|min:10|max:255',
            'phone'         => 'required',
            'mobile_phone'  => 'required',
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
            'phone' => 'telefone',
            'mobile_phone' => 'celular',
        ];
    }
}
