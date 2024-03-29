<?php

namespace PhpStarter\Model;

use PDO;
use PDOException;

class Database
{

    private string $host;
    private int $port;
    private string $db;
    private string $user;
    private string $pass;
    private string $charset;
    private PDO $pdo;

    private static ?Database $instance = null;

    private function __construct()
    {
        $this->host = $_ENV['MYSQL_HOST'];
        $this->port = $_ENV['MYSQL_PORT'];
        $this->db = $_ENV['MYSQL_DATABASE'];
        $this->user = $_ENV['MYSQL_USER'];
        $this->pass = $_ENV['MYSQL_PASSWORD'];
        $this->charset = 'utf8mb4';
        $this->connect();
    }
    public function __clone() { }
    public function __wakeup() { }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function connect(): void
    {
        $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->db;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }
}