<?php

declare(strict_types=1);

namespace Victor\ProjetoEscada;

use Victor\ProjetoEscada\Dao\Dao;
use Victor\ProjetoEscada\Dao\PedidosDao;

class ListaConteudo
{
    private array $colunas;

    private array $linhas;

    public function geraTabela(array $pesquisa): string
    {
        if ($pesquisa === []) {
            return '';
        }
        return $this->geraColunas($pesquisa)->geraLinhas($pesquisa)->__toString();
    }

    private function geraColunas($pesquisa): ListaConteudo
    {
        foreach (Dao::pesquisaAbsoluta($pesquisa)[0] as $coluna => $valor) {
            $colunasLabels[] = $this->pegaLabel($coluna);
        }

        $this->colunas = $colunasLabels;
        return $this;
    }

    private function geraLinhas($pesquisa): ListaConteudo
    {
        $conjuntoDeLinhas = [];
        foreach (Dao::pesquisaAbsoluta($pesquisa) as $row) {
            $linhas = '';
            foreach ($row as $chave => $valor) {
                $linhas .= sprintf('<td>%s</td>', $valor);
            }

            $conjuntoDeLinhas[] = $linhas;
        }

        $this->linhas = $conjuntoDeLinhas;
        return $this;
    }

    private function pegaLabel(string $coluna): string
    {
        if ($coluna === 'nome') {
            return 'Nome';
        }

        if ($coluna === 'id') {
            return 'ID';
        }

        return '';
    }

    public function __toString(): string
    {
        $colunasEmString = '<th>' . implode('</th><th>', $this->colunas) . '</th>';
        $conteudoEmString = '<tr>' . implode('</tr><tr>', $this->linhas) . '</tr>';

        return sprintf(
        '<section class="content">
        <table class="content-table">
            <thead>
            <tr>
            %s
            </tr>
            </thead>
            <tbody>
            %s
            </tbody>
        </table>
        </section>',
        $colunasEmString,
        $conteudoEmString
        );
    }
}