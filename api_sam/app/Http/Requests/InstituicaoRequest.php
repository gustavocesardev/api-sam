<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Domain\Enums\UF;

class InstituicaoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'razao_social' => ['required', 'string', 'max:70'],
            'tipo_instituicao' => ['required', 'string', 'in:PUB,PRI'],
            'tipo_logradouro' => ['required', 'string', 'max:100'],
            'logradouro' => ['required', 'string', 'max:100'],
            'numero' => ['required', 'integer', 'min:1'],
            'cidade' => ['required', 'string', 'max:70'],
            'codigo_municipio' => ['required', 'integer'],
            'uf' => ['required', 'size:2', 'in:'.implode(',', UF::values())],
            'imagem' => ['nullable', 'string', 'max:150'],
            'dominio_email_institucional' => ['required', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'razao_social.required' => 'O campo razão social é obrigatório.',
            'tipo_instituicao.required' => 'O tipo de instituição é obrigatório.',
            'tipo_logradouro.required' => 'O tipo logradouro é obrigatório.',
            'logradouro.required' => 'O logradouro é obrigatório.',
            'numero.required' => 'O número é obrigatório.',
            'numero.integer' => 'O número deve ser um inteiro.',
            'cidade.required' => 'A cidade é obrigatória.',
            'codigo_municipio.required' => 'O código do município é obrigatório.',
            'codigo_municipio.integer' => 'O código do município deve ser um inteiro.',
            'uf.required' => 'A unidade federativa é obrigatória.',
            'uf.size' => 'A unidade federativa deve ter exatamente 2 caracteres.',
            'uf.in' => 'A unidade federativa inválida.',
            'dominio_email_institucional.required' => 'O domínio de e-mail institucional é obrigatório.',
            'imagem.max' => 'A imagem deve ter no máximo 150 caracteres.',
        ];
    }

}
