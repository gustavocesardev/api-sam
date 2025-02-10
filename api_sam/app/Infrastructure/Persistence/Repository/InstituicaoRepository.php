<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Model\Instituicao;
use App\Domain\Repository\InstituicaoRepositoryInterface;

use Illuminate\Support\Collection;

class InstituicaoRepository implements InstituicaoRepositoryInterface
{
    public function findAll(): Collection
    {  
        return Instituicao::all();
    }

    public function find(int $id): Instituicao
    {
        $instituicao = Instituicao::findOrFail($id);
        return $instituicao;
    }

    public function findByDominio(string $dominio): ?Instituicao
    {
        return Instituicao::where('dominio_email_institucional', $dominio)->first();
    }

    public function store(array $data): Instituicao
    {
        $instituicaoEloquent = Instituicao::create($data);
        return $instituicaoEloquent;
    }

    public function update(int $id, array $data): Instituicao
    {
        $instituicaoEloquent = Instituicao::findOrFail($id);
        $instituicaoEloquent->update($data);

        return $instituicaoEloquent;
    }

    public function delete(int $id): bool
    {
        $instituicaoEloquent = Instituicao::findOrFail($id);
        return $instituicaoEloquent->delete();
    }
}
