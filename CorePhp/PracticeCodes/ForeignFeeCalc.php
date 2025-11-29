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

$taxableTransactions = array_filter($rawTransactions, fn($t) => $t['currency'] !== 'EUR');

$feesInEur = array_map(function($t) {
    $feeOriginalCurrency = $t['amount'] * 0.025;

    // Normalize to EUR
    $rateToEur = match ($t['currency']) {
        'USD' => 0.92,
        'JPY' => 0.006,
        default => 0.0,
    };

    return $feeOriginalCurrency * $rateToEur;
}, $taxableTransactions);

$totalTaxPaid = array_reduce(
    $feesInEur,
    fn($carry, $total) => $carry + $total,
    0.0
);

print_r($taxableTransactions);
print_r("Total Monthly Spending (EUR): " . number_format($totalTaxPaid, 3) . "\n");