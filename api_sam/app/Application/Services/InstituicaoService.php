<?php

namespace App\Application\Services;

use App\Infrastructure\Repositories\InstituicaoRepository;
use App\Http\Resources\InstituicaoDTO;

class InstituicaoService
{
    private InstituicaoRepository $instituicaoRepository;

    public function __construct(InstituicaoRepository $instituicaoRepository)
    {
        $this->instituicaoRepository = $instituicaoRepository;
    }

    public function listAll(): array
    {
        return $this->instituicaoRepository->findAll()->map(function ($instituicao) {
            return InstituicaoDTO::fromDomain($instituicao)->toArray();
        })->toArray();
    }

    public function store(array $data): InstituicaoDTO
    {
        $instituicao = $this->instituicaoRepository->store($data);
        return InstituicaoDTO::fromDomain($instituicao);
    }

    public function find(int $id): array
    {
        $instituicao = $this->instituicaoRepository->find($id);
        return InstituicaoDTO::fromDomain($instituicao)->toArray();
    }

    public function update(int $id, array $data): array
    {
        $instituicao = $this->instituicaoRepository->update($id, $data);
        return InstituicaoDTO::fromDomain($instituicao)->toArray();
    }

    public function delete(int $id): void
    {
        $this->instituicaoRepository->delete($id);
    }
}
