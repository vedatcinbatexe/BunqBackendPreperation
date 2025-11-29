<?php

declare(strict_types=1);

$balances = [100, 200, 300];

foreach ($balances as $b) {
    $b = $b + 10;
}

echo "After Value Loop (No changes): ";
print_r($balances);

foreach($balances as &$b) {
    $b = $b * 1.10;
}
unset($b); // CRITICAL: Break the reference connection after loop!

echo "After Value Loop (Changes): ";
print_r($balances);

// Associative Loop with Keys
$user = ['name' => "Vedat", 'role' => 'Admin'];

echo "User Details \n";
foreach($user as $key => $val) {
    echo "- $key: $val\n";
}
