<?php

namespace App\Domain\Enums;

class ErrorContext
{
    const CADASTRO_INSTITUICAO = 'app.instituicao';
    conST CADASTRO_CURSO = 'app.curso';
    
    const CONTEXTS = [
        self::CADASTRO_INSTITUICAO => 'Erro ao cadastrar/atualizar uma instituição.',
        self::CADASTRO_CURSO => 'Erro ao cadastrar/atualizar um curso.'
    ];

    public static function getDescription($context): mixed
    {
        return self::CONTEXTS[$context] ?? 'No context :(';
    }
}
