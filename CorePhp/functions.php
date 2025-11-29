<?php

declare(strict_types=1);

echo "--- Functions, Scope & Advanced Features ---\n";

// --- 1. SCOPE ISOLATION ---
$exchangeRate = 1.10; // Global Variable

function convertToUsd(float $amount): float
{
    // TRYING TO ACCESS GLOBAL VARIABLE DIRECTLY:
    // echo $exchangeRate; // WARNING: Undefined variable '$exchangeRate'

    // In PHP, functions do NOT inherit global scope automatically.
    // You must pass dependencies as arguments. This is "Dependency Injection" in its rawest form.
    return $amount * 1.10;
}

// --- 2. STRICT DEFINITIONS & NAMED ARGUMENTS ---
// Return type ': ?string' means it returns a String OR Null.
function formatBankStatement(string $name, float $amount, string $currency = 'EUR'): ?string
{
    if ($amount < 0) {
        return null; // Don't print negative statements
    }
    // PHP 8.0+ String Interpolation
    return "Statement for $name: $amount $currency";
}

// Calling with Named Arguments (Order doesn't matter, self-documenting)
$statement = formatBankStatement(
    name: 'Vedat',
    amount: 500.00,
    currency: 'USD',
);

echo "$statement\n";

// --- 3. VARIADIC FUNCTIONS (...$args) ---
// Accepts ANY number of floats and packs them into an array called $amounts
function calculateTotalBalance(float ...$amounts): float
{
    // $amounts is now [100.0, 50.5, 20.0]
    return array_sum($amounts);
}

echo "Total Balance: " . calculateTotalBalance(100.0, 50.5, 20.0) . " EUR\n";

// --- 4. ANONYMOUS FUNCTIONS & CLOSURES ---
// This is how we bring outside variables INTO a function scope manually.
$taxRate = 0.20;

// The 'use' keyword captures variables from the parent scope
$calculateTax = function(float $amount) use ($taxRate) {
    return $amount * $taxRate;
};

echo "Tax on 100 EUR: " . $calculateTax(100.0) . " EUR\n";

// --- 5. ARROW FUNCTIONS (PHP 7.4+) ---
// Cleaner syntax for simple logic. Auto-captures scope (no 'use' needed).
$multiplier = 2;
$doubleIt = fn($n) => $n * $multiplier;

echo "Double 10: " . $doubleIt(10) . "\n";