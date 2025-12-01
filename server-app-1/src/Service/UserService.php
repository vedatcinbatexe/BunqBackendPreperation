<?php
namespace App\Service;

use App\Repository\UserRepository;
use http\Exception\InvalidArgumentException;

class UserService implements IUserService {
    public function __construct(private UserRepository $repository) {}

    public function getAllUsers(): array
    {
        return $this->repository->findAll();
    }

    public function registerUser(string $username, string $email): int
    {
        // 1. Business Logic / Validation
        if (empty($username)) {
            throw new InvalidArgumentException("Username cannot be empty");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Invalid email format");
        }

        // 2. Call the Repository
        return $this->repository->create($username, $email);
    }
}