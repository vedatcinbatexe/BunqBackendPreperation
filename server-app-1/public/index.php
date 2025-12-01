<?php

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// Controllers and Middlewares
use App\Controller\UserController;
use App\Database;

// 1. Load Composer Autoloader
require __DIR__ . '/../vendor/autoload.php';

// Setup Container Builder
$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    // Define the Database Connection
    PDO::class => function () {
        return (new Database())->getConnection();
    },

    // Interface Binding
    \App\Service\IUserService::class => \DI\autowire(\App\Service\UserService::class)
    ]
);

$container = $containerBuilder->build();
AppFactory::setContainer($container);
$app = AppFactory::create();

$app->addBodyParsingMiddleware();
$app->AddErrorMiddleware(true, true, true);

// ROUTES
/*$app->get('/users', function (Request $request, Response $response, array $args) {
    $pdo = $this->get('db');

    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetchAll();

    $response->getBody()->write(json_encode($users));

    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/users', function (Request $request, Response $response, array $args) {
    $pdo = $this->get('db');

    $data = $request->getParsedBody();

    if(!isset($data['username']) || !isset($data['email'])) {
        $response->getBody()->write(json_encode(['error' => 'Missing fields']));
        return $response->withStatus(400)->withHeader('Content-Type', 'application/json');
    }

    $sql = "INSERT INTO users (username, email) VALUES (:username, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'username' => $data['username'],
        'email' => $data['email']
    ]);
    $payload = json_encode([
        'status' => "User created",
        'is' => $pdo->lastInsertId()
    ]);

    $response->getBody()->write($payload);
    return $response->withHeader('Content-Type', 'application/json');
});
*/

$app->get('/users', [UserController::class, 'index']);
$app->post('/register', [UserController::class, 'create']);

$app->run();