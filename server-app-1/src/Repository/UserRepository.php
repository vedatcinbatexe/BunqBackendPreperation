<?php

namespace App\Repository;

use PDO;

class UserRepository {
    public function __construct(private PDO $pdo) {}

    public function findAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll();
    }

    public function create(string $username, string $email): int {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email) VALUES (:username, :email)");
        $stmt->execute([
            'username' => $username,
            'email' => $email
        ]);

        return $this->pdo->lastInsertId();
    }
}