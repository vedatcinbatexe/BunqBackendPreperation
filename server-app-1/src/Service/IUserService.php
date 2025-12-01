<?php

namespace App\Service;

interface IUserService {
    public function getAllUsers(): array;
    public function registerUser(string $username, string $email): int;
}