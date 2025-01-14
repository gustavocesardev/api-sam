<?php

namespace App\Domain\Instituicao;

use Illuminate\Support\Collection;

interface InstituicaoRepositoryInterface
{
    public function findAll(): Collection;

    public function find(int $id): Instituicao;

    public function store(array $data): Instituicao;

    public function update(int $id, array $data): Instituicao;

    public function delete(int $id): mixed;
}
