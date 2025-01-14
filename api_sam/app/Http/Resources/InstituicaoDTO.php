<?php

namespace App\Http\Resources;

use App\Domain\Instituicao\Instituicao;

class InstituicaoDTO
{
    private int $id;
    private string $razaoSocial;
    private string $tipoInstituicao;
    private string $logradouro;
    private int $numero;
    private string $cidade;
    private int $codigoMunicipio;
    private string $uf;
    private string $dominioEmailInstitucional;
    private ?string $imagem;

    public function __construct(
        int $id,
        string $razaoSocial,
        string $tipoInstituicao,
        string $logradouro,
        int $numero,
        string $cidade,
        int $codigoMunicipio,
        string $uf,
        string $dominioEmailInstitucional,
        ?string $imagem = null
    ) {
        $this->id = $id;
        $this->razaoSocial = $razaoSocial;
        $this->tipoInstituicao = $tipoInstituicao;
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->cidade = $cidade;
        $this->codigoMunicipio = $codigoMunicipio;
        $this->uf = $uf;
        $this->dominioEmailInstitucional = $dominioEmailInstitucional;
        $this->imagem = $imagem;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getRazaoSocial(): string
    {
        return $this->razaoSocial;
    }

    public function getTipoInstituicao(): string
    {
        return $this->tipoInstituicao;
    }

    public function getLogradouro(): string
    {
        return $this->logradouro;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function getCodigoMunicipio(): int
    {
        return $this->codigoMunicipio;
    }

    public function getUf(): string
    {
        return $this->uf;
    }

    public function getDominioEmailInstitucional(): string
    {
        return $this->dominioEmailInstitucional;
    }

    public function getImagem(): ?string
    {
        return $this->imagem;
    }

    public static function fromDomain(Instituicao $instituicao): self
    {
        return new self(
            $instituicao->getId(),
            $instituicao->getRazaoSocial(),
            $instituicao->getTipoInstituicao()->value,
            $instituicao->getLogradouro(),
            $instituicao->getNumero(),
            $instituicao->getCidade(),
            $instituicao->getCodigoMunicipio(),
            $instituicao->getUf()->value,
            $instituicao->getDominioEmailInstitucional(),
            $instituicao->getImagem()
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'razaoSocial' => $this->getRazaoSocial(),
            'tipoInstituicao' => $this->getTipoInstituicao(),
            'logradouro' => $this->getLogradouro(),
            'numero' => $this->getNumero(),
            'cidade' => $this->getCidade(),
            'codigoMunicipio' => $this->getCodigoMunicipio(),
            'uf' => $this->getUf(),
            'dominioEmailInstitucional' => $this->getDominioEmailInstitucional(),
            'imagem' => $this->getImagem(),
        ];
    }
}
