<?php

declare(strict_types=1);

namespace Victor\ProjetoEscada;

class CampoNome
{
    private const NOME_LABEL = 'Nome';

    private const NOME_NAME = 'buscaNome';

    public function render(): string
    {
        return $this->campos();
    }

    private function campos(): string
    {
        $valorBusca = htmlspecialchars($_GET[self::NOME_NAME] ?? '');

        $placeholderSeguro = htmlspecialchars(self::NOME_LABEL);

        $html = sprintf(
            '<input type="search" name="%s" placeholder="%s" value="%s">
         <button type="submit">Buscar</button>',
            self::NOME_NAME,
            $placeholderSeguro,
            $valorBusca
        );

        return $html;
    }
}