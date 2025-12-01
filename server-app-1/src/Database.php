<?php

namespace App;

use PDO;
use PDOException;

class Database {
    private string $host = '127.0.0.1';
    private string $dbname = 'testDb';
    private string $user = 'root';
    private string $pass = 'localHostPassword';

    public function getConnection(): PDO {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            return new PDO($dsn, $this->user, $this->pass, $options);
        }catch (PDOException $e) {
            throw new PDOException("Database connection error: " . $e->getMessage());
        }
    }
}