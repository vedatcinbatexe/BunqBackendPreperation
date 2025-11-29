<?php

declare(strict_types=1);

$dbRow = [101, 'Vedat', 'Istanbul', 'Active'];

// OLD WAY
// $id = $dbRow[0];
// $name = $dbRow[1];

// NEW WAY (Destructuring)
[$id, $name, , $status] = $dbRow;

echo "User $name (ID: $id) is $status\n";

// ASSOCIATIVE DESTRUCTURING
$config = [
    'memory_limit' => '512M',
    'timeout' => 60,
    'log_leve' => 'debug'
];

// Pull out keys into variables
['memory_limit' => $mem, 'timeout' => $time] = $config;

echo "Config: Memory: $mem, Timeout: $time\n";

// Spread Operator
$oldTransactions = [100, 200];
$newTransactions = [300, 400];

$allTransactions = [...$oldTransactions, ...$newTransactions, 500];

print_r($allTransactions);

$defaultOptions = ['color' => 'blue', 'size' => 'M'];
$userOptions = ['color' => 'red'];

$finalConfig = [...$defaultOptions, ...$userOptions]; 

print_r($finalConfig); // Color will be RED
