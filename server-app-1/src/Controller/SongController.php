<?php


namespace App\Controller;

use App\Service\IUserService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Service;

class SongController
{
    public function __construct(private Service\ISongService $songService)
    {
    }

    public function allSongs(Request $request, Response $response): Response
    {
        $allSongs = $this->songService->getSongs();

        $response->getBody()->write(json_encode($allSongs));
        return $response->withHeader('Content-Type', 'application/json');
    }
}