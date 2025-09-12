<?php

declare(strict_types=1);

namespace Victor\ProjetoEscada\Database;

use PDO;
use Dotenv\Dotenv;

class Database
{
    private static ?PDO $connection = null;

    private function __construct() {}

    public static function getConnection()
    {
        if (self::$connection === null) {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
            $dotenv->load();

            $dbHost = $_ENV['DB_HOST'];
            $dbPort = $_ENV['DB_PORT'];
            $dbName = $_ENV['DB_NAME'];
            $dbUser = $_ENV['DB_USER'];
            $dbPass = $_ENV['DB_PASS'];

            $dsn = "mysql:host={$dbHost};port={$dbPort};dbname={$dbName};charset=utf8mb4";

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Lança exceções em caso de erros
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Retorna arrays associativos por padrão
                PDO::ATTR_EMULATE_PREPARES   => false,                  // Usa prepared statements nativos
            ];

            try {
                self::$connection = new PDO($dsn, $dbUser, $dbPass, $options);
            } catch (\PDOException $e) {
                die("Erro de conexão com o banco de dados: " . $e->getMessage());
            }
        }

        return self::$connection;
    }

    private function __clone() {}

    public function __wakeup() {}
}