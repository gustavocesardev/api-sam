<?php

namespace App\Domain\Model;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';

    protected $fillable = [
        'id_instituicao',
        'nome_curso',
        'situacao',
    ];
}
