<?php

declare(strict_types=1);

use Victor\ProjetoEscada\Dao\PedidosDao;
use Victor\ProjetoEscada\FormPesquisa;
use Victor\ProjetoEscada\ListaConteudo;

$pesquisa = $_GET['pesq'] ?? [];

$tela = (new FormPesquisa())->adicionaCampoId()->adicionaCampoNome()->__toString();

$tela .= (new ListaConteudo())->geraTabela($pesquisa);

echo $tela;