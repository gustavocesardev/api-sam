<?php

namespace App\Application\Services;

use App\Domain\Enums\ErrorContext;
use App\Domain\Exceptions\DuplicateEntryException;
use App\Domain\Model\Instituicao;
use App\Domain\Repository\InstituicaoRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Http\Response;

class InstituicaoService
{
    private InstituicaoRepositoryInterface $instituicaoRepository;

    public function __construct(InstituicaoRepositoryInterface $instituicaoRepository)
    {
        $this->instituicaoRepository = $instituicaoRepository;
    }

    public function listAll(): Collection
    {
        return $this->instituicaoRepository->findAll();
    }

    public function store(array $data): Instituicao
    {
        // Verificando se o dominio já existe
        $instituicaoDominio = $this->instituicaoRepository->findByDominio($data['dominio_email_institucional']);

        if (!empty($instituicaoDominio)) 
        {
            throw new DuplicateEntryException(
                'dominio_email_institucional',
                ErrorContext::CADASTRO_INSTITUICAO,
                Response::HTTP_CONFLICT
            );
        }
            
        return $this->instituicaoRepository->store($data);
    }

    public function find(int $id): Instituicao
    {
        return $this->instituicaoRepository->find($id);
    }

    public function update(int $id, array $data): Instituicao
    {
        // Verificando se o dominio já existe
        $instituicaoDominio = $this->instituicaoRepository->findByDominio($data['dominio_email_institucional']);

        if (!empty($instituicaoDominio)) 
        {
            throw new DuplicateEntryException(
                'dominio_email_institucional',
                ErrorContext::UPDATE_INSTITUICAO,
                Response::HTTP_CONFLICT
            );
        }

        return $this->instituicaoRepository->update($id, $data);
    }

    public function delete(int $id): void
    {
        $this->instituicaoRepository->delete($id);
    }
}
