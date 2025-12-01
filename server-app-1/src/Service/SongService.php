<?php

namespace App\Service;

use App\Repository\SongRepository;

class SongService implements ISongService {
    public function __construct(private SongRepository $repo)
    {
    }

    public function getSongs(): array {
        return $this->repo->findAll();
    }
}