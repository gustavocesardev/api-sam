<?php

namespace App\Domain\Exceptions;

use Exception;

class DuplicateEntryException extends AppException
{
    public function __construct(
        string $attribute,
        string $context,
        int $code = 0,
        Exception $previous = null
    )
    {
        parent::__construct(
            "O valor do atributo único '{$attribute}' já está cadastrado.",
            $context,
            $code,
            $previous
        );
    }
}
