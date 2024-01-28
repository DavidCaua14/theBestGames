<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('admin-access');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:20',
            ],
            'description' => [
                'required',
                'string',
                'min:20',
            ]
            ];
    }

    public function messages(): array{
        return [
            'name.required' => 'O nome do jogo é Obrigatório',
            'name.string' => 'O nome do jogo deve ser uma String',
            'name.min' => 'O nome do jogo deve ter no minimo 3 caracteres',
            'name.max' => 'O nome do jogo deve ter no maximo 100 caracteres',

            'description.required' => 'A descrição do jogo é obrigatório',
            'description.string' => 'A descrição do jogo deve ser uma string',
            'description.min' => 'A descrição do jogo deve ter no minimo 20 caracteres',
        ];
    }
}
