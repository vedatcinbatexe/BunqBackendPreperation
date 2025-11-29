<?php

declare(strict_types=1);

echo "--- Functions, Scope & Advanced Features ---\n";

$exchangeRate = 1.10;

function convertToUsd(float $amount): float
{
    return $amount * 1.10;
}

function formatBankStatement(string $name, float $amount, string $currency = 'EUR'): ?string
{
    if ($amount < 0) {
        return null;
    }
    return "Statement for $name: $amount $currency";
}

$statement = formatBankStatement(
    name: 'Vedat',
    amount: 500.00,
    currency: 'USD',
);

echo "$statement\n";

function calculateTotalBalance(float ...$amounts): float
{
    return array_sum($amounts);
}

echo "Total Balance: " . calculateTotalBalance(100.0, 50.5, 20.0) . " EUR\n";

$taxRate = 0.20;

$calculateTax = function(float $amount) use ($taxRate) {
    return $amount * $taxRate;
};

echo "Tax on 100 EUR: " . $calculateTax(100.0) . " EUR\n";

$multiplier = 2;
$doubleIt = fn($n) => $n * $multiplier;

echo "Double 10: " . $doubleIt(10) . "\n";