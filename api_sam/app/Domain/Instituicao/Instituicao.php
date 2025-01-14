<?php

namespace App\Domain\Instituicao;

use App\Domain\Enums\TipoInstituicao;
use App\Domain\Enums\UF;
use App\Infrastructure\Models\EloquentInstituicao;

class Instituicao
{
    private ?int $id;
    private string $razaoSocial;
    private TipoInstituicao $tipoInstituicao;
    private string $logradouro;
    private int $numero;
    private string $cidade;
    private int $codigoMunicipio;
    private UF $uf;
    private string $dominioEmailInstitucional;
    private ?string $imagem;

    public function __construct(
        ?int $id,
        string $razaoSocial,
        TipoInstituicao $tipoInstituicao,
        string $logradouro,
        int $numero,
        string $cidade,
        int $codigoMunicipio,
        UF $uf,
        string $dominioEmailInstitucional,
        ?string $imagem
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

    public function getId(): int | null
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        if (is_null($this->id)) $this->id = $id;
    }

    public function getRazaoSocial(): string
    {
        return $this->razaoSocial;
    }

    public function setRazaoSocial(string $razaoSocial): void
    {
        $this->razaoSocial = $razaoSocial;
    }

    public function getTipoInstituicao(): TipoInstituicao
    {
        return $this->tipoInstituicao;
    }

    public function setTipoInstituicao(TipoInstituicao $tipoInstituicao): void
    {
        $this->tipoInstituicao = $tipoInstituicao;
    }

    public function getLogradouro(): string
    {
        return $this->logradouro;
    }

    public function setLogradouro(string $logradouro): void
    {
        $this->logradouro = $logradouro;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade): void
    {
        $this->cidade = $cidade;
    }

    public function getCodigoMunicipio(): int
    {
        return $this->codigoMunicipio;
    }

    public function setCodigoMunicipio(int $codigoMunicipio): void
    {
        $this->codigoMunicipio = $codigoMunicipio;
    }

    public function getUf(): UF
    {
        return $this->uf;
    }

    public function setUf(UF $uf): void
    {
        $this->uf = $uf;
    }

    public function getDominioEmailInstitucional(): string
    {
        return $this->dominioEmailInstitucional;
    }

    public function setDominioEmailInstitucional(string $dominioEmailInstitucional): void
    {
        $this->dominioEmailInstitucional = $dominioEmailInstitucional;
    }

    public function getImagem(): string | null
    {
        return $this->imagem;
    }

    public function setImagem(?string $imagem): void
    {
        $this->imagem = $imagem;
    }

    public static function mapToDomain(EloquentInstituicao $instituicao): Instituicao
    {
        return new self(
            $instituicao->id,
            $instituicao->razao_social,
            TipoInstituicao::from($instituicao->tipo_instituicao),
            $instituicao->logradouro,
            $instituicao->numero,
            $instituicao->cidade,
            $instituicao->codigo_municipio,
            UF::from($instituicao->uf),
            $instituicao->dominio_email_institucional,
            $instituicao->imagem
        );
    }
}
