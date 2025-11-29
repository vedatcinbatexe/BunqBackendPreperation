<?php

header('Content-type: application/json');

header('Access-Control-Allow-Origin: *');

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case "GET":
        handleGetRequest();
        break;
    case "POST":
        handlePostRequest();
        break;
}

function handleGetRequest()
{
    $mockUsers = [
        ['id' => 1, 'name' => 'Vedat', 'role' => 'Software Engineer'],
        ['id' => 2, 'name' => 'Ali', 'role' => 'Manager'],
        ['id' => 3, 'name' => 'Ayşe', 'role' => 'Designer']
    ];

    http_response_code(200);

    echo json_encode([
        'status' => 'sucess',
        'data' => $mockUsers
    ]);
}

function handlePostRequest()
{
    $rawInput = file_get_contents("php://input");

    $data = json_decode($rawInput, true);

    if (!isset($data['name']) || !isset($data['role'])) {
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => 'Missing required fields: name and role'
        ]);

        return; // Stop execution
    }

    $newUser = [
        'id' => rand(100, 999), // Fake ID
        'name' => $data['name'],
        'role' => $data['role'],
        'created_at' => date('Y-m-d H:i:s')
    ];

    http_response_code(201);
    echo json_encode([
        'status' => 'sucess',
        'message' => 'User created successfully',
        'data' => $newUser
    ]);
}