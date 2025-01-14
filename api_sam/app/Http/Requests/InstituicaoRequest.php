<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstituicaoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'razao_social' => 'required|string|max:70',
            'tipo_instituicao' => 'required|in:PUB,PRI',
            'logradouro' => 'required|string|max:100',
            'numero' => 'required|integer|min:1',
            'cidade' => 'required|string|max:70',
            'codigo_municipio' => 'required|integer',
            'uf' => 'required|size:2',
            'dominio_email_institucional' => 'required|string|max:100',
            'imagem' => 'nullable|string|max:150',
        ];
    }
}
