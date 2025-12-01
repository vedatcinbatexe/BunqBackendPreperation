<?php

namespace App\Repository;

use App\Model\User;
use PDO;

class UserRepository {
    public function __construct(private PDO $pdo) {}

    public function findAll(): array {
        return User::all()->toArray();
    }

    public function create(string $username, string $email): int {
        $user = User::create([
            'username' => $username,
            'email' => $email
        ]);

        return $user->id;
    }
}