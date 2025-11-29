<?php

declare(strict_types=1);

// array_filter: Removes items
// array_map: Transforms items
// array_reduce: Calculates a single value

$rawTransactions = [
    ['id' => 1, 'amount' => 100, 'valid' => true],
    ['id' => 2, 'amount' => -50, 'valid' => false], // Fraud?
    ['id' => 3, 'amount' => 200, 'valid' => true],
];

$validTx = array_filter($rawTransactions, fn($t) => $t['valid']);

$amountsWithTax = array_map(fn($t) => $t['amount'] * 0.98, $validTx);

$totalBalance = array_reduce(
    $amountsWithTax,
    fn($carry, $amount) => $carry + $amount,
    0
);

print_r($amountsWithTax);
echo "Total Balance: $totalBalance\n";