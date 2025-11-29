<?php


$currency = $_GET['currency'] ?? 'USD';
$limit = $_GET['limit'] ?? 5;

echo "Fetching last $limit transactions in $currency";


$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$ip = $_SERVER['REMOTE_ADDR'];

echo "User at $ip tried to $method the URL: $uri\n";

$username = $_POST['username'];
$password = $_POST['password'];

// How you are going to read json request that comes from client and read in php ?
$rawJson = file_get_contents('php://input');

$data = json_decode($rawJson, true);

$amount = $data['amount'] ?? 0;
echo "Processing JSON amount: $amount\n";

header('Content-Type: application/json');

http_response_code(201);

$response = [
    'status' => 'success',
    'message' => 'Transaction created',
    'id' => 1234,
];

echo json_encode($response, JSON_PRETTY_PRINT);
