<?php

namespace Victor\ProjetoEscada\Dao;

use PDO;
use Victor\ProjetoEscada\Database\Database;

class Dao
{
    public static function pegaBase(): PDO
    {
        return Database::getConnection();
    }

    public static function pesquisaAbsoluta($pesquisa): array
    {
        $sql = 'SELECT * FROM `pedidos` WHERE 1 = 1 ';

        foreach ($pesquisa as $chave => $valor) {
            if (empty($valor)) {
                continue;
            }

            $sql .= "AND `$chave` LIKE :busca_" . $valor;
        }

        $stmt = self::pegaBase()->prepare($sql);

        foreach ($pesquisa as $chave => $valor) {
            if (empty($valor)) {
                continue;
            }

            $stmt->bindValue(':busca_' . $valor, '%' . $valor . '%');
        }

        $stmt->execute();
        return $stmt->fetchAll();
    }
}