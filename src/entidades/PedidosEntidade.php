<?php

declare(strict_types=1);

namespace Victor\ProjetoEscada\entidades;

class PedidosEntidade
{
    private string $nome;

    public function __constructor(): void
    {
        $this->nome = '';
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): PedidosEntidade
    {
        $this->nome = $nome;
        return $this;
    }
}