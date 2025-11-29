<?php

declare(strict_types=1);

$rawTransactions = [
    ['id' => 1, 'desc' => 'Salary',      'type' => 'credit', 'amount' => 5000.0, 'currency' => 'EUR'],
    ['id' => 2, 'desc' => 'Netflix',     'type' => 'debit',  'amount' => 15.99,  'currency' => 'USD'],
    ['id' => 3, 'desc' => 'Rent',        'type' => 'debit',  'amount' => 800.0,  'currency' => 'EUR'],
    ['id' => 4, 'desc' => 'Coffee',      'type' => 'debit',  'amount' => 5.50,   'currency' => 'EUR'],
    ['id' => 5, 'desc' => 'Freelance',   'type' => 'credit', 'amount' => 300.0,  'currency' => 'USD'],
    ['id' => 6, 'desc' => 'Amazon JP',   'type' => 'debit',  'amount' => 2000.0, 'currency' => 'JPY'],
];

// Get total debit transactions EUR

$spending = array_filter($rawTransactions, fn($t) => $t['type'] === 'debit');

$normalizedAmounts = array_map(function ($t) {
    $rate = match ($t['currency']) {
        'USD' => 0.92,
        'EUR' => 1.0,
        'JPY' => 0.006,
        default => 0.0,
    };

    return $t['amount'] * $rate;
}, $spending);

$totalExpense = array_reduce(
    $normalizedAmounts,
    fn($carry, $total) => $carry + $total,
    0
);

print_r($spending); // Shows filtered list
print_r($normalizedAmounts); // Shows converted values
echo "\nTotal Monthly Spending (EUR): " . number_format($totalExpense, 3) . "\n";



