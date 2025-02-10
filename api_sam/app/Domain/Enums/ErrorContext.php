<?php

namespace App\Domain\Enums;

class ErrorContext
{
    const CADASTRO_INSTITUICAO = 'app.cadastro.instituicao';
    const UPDATE_INSTITUICAO = 'app.update.instituicao';

    const CONTEXTS = [
        self::CADASTRO_INSTITUICAO => 'Erro ao cadastrar uma instituição',
        self::UPDATE_INSTITUICAO => 'Erro ao editar uma instituição'
    ];

    public static function getDescription($context): mixed
    {
        return self::CONTEXTS[$context] ?? 'No context :(';
    }
}
