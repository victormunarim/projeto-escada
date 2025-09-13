<?php

declare(strict_types=1);

namespace Victor\ProjetoEscada;

use Victor\ProjetoEscada\Campos\CampoId;
use Victor\ProjetoEscada\Campos\CampoNome;

class FormPesquisa
{
    private $campos = [];

    public function adicionaCampoNome(): FormPesquisa
    {
        $this->campos[] = (new CampoNome())->render();
        return $this;
    }

    public function adicionaCampoId(): FormPesquisa
    {
        $this->campos[] = (new CampoId())->render();
        return $this;
    }

    public function __toString(): string
    {
        $camposs = implode('', $this->campos);

        return sprintf(
            '<h1>Pedidos</h1>
                    <section class="toolbar">
                    <form class="search-form" method="GET" action="index.php">
                    %s
                    <button type="submit">Buscar</button>
                    </form>
                    <a href="form.php" class="btn btn-primary">Adicionar Novo</a>
                    </section>',
                    $camposs
        );
    }
}