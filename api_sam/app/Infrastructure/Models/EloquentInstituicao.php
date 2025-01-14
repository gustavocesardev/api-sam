<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class EloquentInstituicao extends Model
{
    protected $table = 'instituicao';
    protected $fillable = [
        'razao_social',
        'tipo_instituicao',
        'logradouro',
        'numero',
        'cidade',
        'codigo_municipio',
        'uf',
        'dominio_email_institucional',
        'imagem',
    ];
}
