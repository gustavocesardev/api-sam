<?php

namespace App\Domain\Model;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $table = 'instituicao';
    protected $fillable = [
        'razao_social',
        'tipo_instituicao',
        'tipo_logradouro',
        'logradouro',
        'numero',
        'cidade',
        'codigo_municipio',
        'uf',
        'dominio_email_institucional',
        'imagem',
    ];
}
