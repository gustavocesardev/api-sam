<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Instituicao\Instituicao;
use App\Domain\Instituicao\InstituicaoRepositoryInterface;
use App\Infrastructure\Models\EloquentInstituicao;
use Illuminate\Support\Collection;

class InstituicaoRepository implements InstituicaoRepositoryInterface
{
    public function findAll(): Collection
    {  
        return EloquentInstituicao::all()->map(function ($instituicao) {
            return Instituicao::mapToDomain($instituicao);
        });
    }

    public function find(int $id): Instituicao
    {
        $instituicao = EloquentInstituicao::findOrFail($id);
        return Instituicao::mapToDomain($instituicao);
    }

    public function store(array $data): Instituicao
    {
        $instituicaoEloquent = EloquentInstituicao::create($data);
        return Instituicao::mapToDomain($instituicaoEloquent);
    }

    public function update(int $id, array $data): Instituicao
    {
        $instituicaoEloquent = EloquentInstituicao::findOrFail($id);
        $instituicaoEloquent->update($data);

        return Instituicao::mapToDomain($instituicaoEloquent);
    }

    public function delete(int $id): mixed
    {
        $instituicaoEloquent = EloquentInstituicao::findOrFail($id);
        return $instituicaoEloquent->delete();
    }
}
