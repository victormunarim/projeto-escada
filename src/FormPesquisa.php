<?php

declare(strict_types=1);

namespace Victor\ProjetoEscada;

class FormPesquisa
{
    private $campos = [];

    public function renderPesquisa(): array
    {
        return $this->campos;
    }

    public function adicionaCampoNome(): FormPesquisa
    {
        $this->campos[] = (new CampoNome())->render();
        return $this;
    }
}