<?php

declare(strict_types=1);

namespace Victor\ProjetoEscada\Dao;

use PDO;
use Victor\ProjetoEscada\Database\Database;

class PedidosDao
{
    public static function pegaBase(): PDO
    {
        return Database::getConnection();
    }

    public static function buscaPedidosPorNome($nome)
    {
        $sql = 'SELECT * FROM `pedidos` WHERE `nome` LIKE :busca ORDER BY `nome`';
        $stmt = self::pegaBase()->prepare($sql);

        $stmt->bindValue(':busca', '%' . $nome . '%');

        $stmt->execute();
        return $stmt->fetchAll();
    }
}