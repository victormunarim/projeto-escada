<?php

declare(strict_types=1);

namespace Victor\ProjetoEscada\Campos;

class CampoId
{
    private const NOME_LABEL = 'ID';

    private const NOME_NAME = 'pesq[id]';

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