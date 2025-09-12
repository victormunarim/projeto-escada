<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Victor\ProjetoEscada\Database\Database;
use Victor\ProjetoEscada\CampoNome;
use Victor\ProjetoEscada\FormPesquisa;
use Victor\ProjetoEscada\ListaConteudo;

//try {
//    $pdo = Database::getConnection();
//
//    echo "Conexão com o banco de dados obtida com sucesso usando POO! ✅<br>";
//
//    $stmt = $pdo->query("SELECT 'Olá, Mundo! Esta mensagem veio do banco de dados.' AS message");
//    $result = $stmt->fetch();
//
//    if ($result) {
//        echo "<strong>Mensagem do banco:</strong> " . htmlspecialchars($result['message']);
//    }
//
//} catch (PDOException $e) {
//    echo "Ocorreu um erro ao executar a consulta: " . $e->getMessage();
//}
?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD com PHP PDO</title>
    <link rel="stylesheet" href="style.css">
</head>
<main>
    <h1>Pedidos</h1>

    <section class="toolbar">
        <form class="search-form" method="GET" action="index.php">
            <?php
            foreach ((new FormPesquisa())
                             ->adicionaCampoNome()
                             ->renderPesquisa() as $campo
            ) echo $campo;
            ?>
        </form>
        <a href="form.php" class="btn btn-primary">Adicionar Novo</a>
    </section>

    <section class="content">
        <table class="content-table">
            <thead>
            <tr>
                <?php
                require './src/Database/Database.php';

                $busca = $_GET['buscaNome'] ?? '';

                $pdo = Database::getConnection();
                $sql = 'SELECT * FROM `pedidos` WHERE `nome` LIKE :busca';

                $stmt = $pdo->prepare($sql);
                $parametroBusca = '%' . $busca . '%';
                $stmt->bindValue(':busca', $parametroBusca);
                $stmt->execute();
                $pedidos = $stmt->fetchAll();

                foreach ((new ListaConteudo())->renderColunas($pedidos[0]) as $coluna) {
                    echo sprintf('<th>%s</th>', $coluna);
                }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php
            require './src/Database/Database.php';

            $busca = $_GET['buscaNome'] ?? '';

            ?>

            </tbody>
        </table>
    </section>
</main>
</html>