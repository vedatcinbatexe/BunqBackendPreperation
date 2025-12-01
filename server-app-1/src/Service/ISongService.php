<?php

namespace App\Service;

use App\Model\Song;

interface ISongService {
    public function getSongs(): array;
}