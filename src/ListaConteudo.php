<?php

declare(strict_types=1);

namespace Victor\ProjetoEscada;

class ListaConteudo
{
    public function renderColunas(array $conteudo): array
    {
        $colunas = array_keys($conteudo);

        $colunasLabels = [];
        foreach ($colunas as $coluna) {
            $colunasLabels[] = $this->pegaLabel($coluna);
        }

        return $colunasLabels;
    }

    private function pegaLabel(string $coluna): string
    {
        if ($coluna === 'nome') {
            return 'Nome';
        }

        if ($coluna === 'idade') {
            return 'Idade';
        }

        if ($coluna === 'id') {
            return 'ID';
        }

        return '';
    }
}