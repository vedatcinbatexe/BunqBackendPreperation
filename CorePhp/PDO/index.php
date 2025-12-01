<?php

declare(strict_types=1);

$host = '127.0.0.1';
$db = "testdbName";
$user = "root";
$pass = "mysqllocalpassword";
$charset="utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    // NEVER DO THIS
    //$sql = "SELECT * FROM users WHERE id = " . $_GET['id'];

    // Solution -> Prepared Statements: We separate the "instruction" from Data
    // Prepare: We send the SQL template to the database with placeholders. The database compiles it
    // Bind/Execute: We send the raw data separately. The database treats it purely as text, never as code

    //$userId = 12;

    // We use :id as a placeholder. We do NOT put the variable here
    //$stmt = $pdo->prepare("SELECT * FROM users WHERE userId = :id");

    // We map the placeholder ':id' to the actual variable $userId
    //$stmt->execute(['id' => $userId]);

    // fetch() gets a single row. fetchAll() gets array of rows
    //$user = $stmt->fetch();

    /*if(!$user){
        echo json_encode([
            'status' => 'success',
            'data' => "No user found with id $userId"
        ]);
    }else {
        echo json_encode([
            'status' => 'sucess',
            'data' => $user
        ]);
    }*/

    // INSERT NEW USER
    $sql = "INSERT INTO users (username, firstName, lastName, email, is_deleted) VALUES (:username, :firstName, :lastName, :email, :is_deleted)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        'username' => "vedatthanix",
        'firstName' => "vedatthanix",
        'lastName' => "cinbat",
        'email' => "vedatthanix@gmail.com",
        'is_deleted' => 0
    ]);

    echo "New user created with ID: " . $pdo->lastInsertId();

}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
