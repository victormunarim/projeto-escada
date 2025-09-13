<?php

declare(strict_types=1);

namespace Victor\ProjetoEscada\Campos;

class CampoNome
{
    private const NOME_LABEL = 'Nome';

    private const NOME_NAME = 'pesq[nome]';

    public function render(): string
    {
        return $this->campos();
    }

    private function campos(): string
    {
        $valorBusca = htmlspecialchars($_GET[self::NOME_NAME] ?? '');

        $placeholderSeguro = htmlspecialchars(self::NOME_LABEL);

        $html = sprintf(
            '<input type="search" name="%s" placeholder="%s" value="%s">',
            self::NOME_NAME,
            $placeholderSeguro,
            $valorBusca
        );

        return $html;
    }
}