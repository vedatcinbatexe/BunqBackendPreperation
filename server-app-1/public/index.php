<?php

use App\Controller\SongController;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Illuminate\Database\Capsule\Manager as Capsule;

// Controllers and Middlewares
use App\Controller\UserController;
use App\Database;

// 1. Load Composer Autoloader
require __DIR__ . '/../vendor/autoload.php';

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'port'      => 3306,
    'database'  => 'bunq_test',
    'username'  => 'root',
    'password'  => 'test',
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

// Setup Container Builder
$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    // Define the Database Connection
    PDO::class => function () {
        return (new Database())->getConnection();
    },

    // Interface Binding
        \App\Service\IUserService::class => \DI\autowire(\App\Service\UserService::class),
        \App\Service\ISongService::class => \DI\autowire(\App\Service\SongService::class)
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
$app->get('/songs', [SongController::class, 'allSongs']);

$app->run();