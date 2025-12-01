<?php

namespace App\Controller;

use App\Service\IUserService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Service;

class UserController {
    public function __construct(private IUserService $userService) {}

    public function index(Request $request, Response $response): Response {
        $users = $this->userService->getAllUsers();

        $response->getBody()->write(json_encode($users));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function create(Request $request, Response $response): Response {
        $username = $request->getParsedBody()['username'];
        $email = $request->getParsedBody()['email'];

        if(!isset($username) || !isset($email)) {
            $response->getBody()->write(json_encode([
                'status' => 'error',
                'data' => 'missing parameters'
            ]));

            return $response->withStatus(400)->withHeader('Content-Type', 'application/json');
        }

        $newId = $this->userService->registerUser($username, $email);

        // 4. Success Response
        $payload = json_encode([
            'status' => 'success',
            'message' => 'User registered',
            'data' => [
                'id' => $newId,
                'username' => $username
            ]
        ]);

        $response->getBody()->write($payload);
        return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
    }
}