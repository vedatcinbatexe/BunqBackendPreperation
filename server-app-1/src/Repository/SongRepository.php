<?php

namespace App\Repository;

use App\Model\Song;
use PDO;

class SongRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function findAll(): array
    {
        return Song::all()->toArray();
    }
}