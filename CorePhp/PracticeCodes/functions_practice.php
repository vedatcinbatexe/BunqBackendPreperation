<?php
declare(strict_types=1);


// App 1: The Global Commission Calculator
// Focus: Scope Isolation & Anonymous Functions (use)

$commissionRate = 0.05;

$calculateFee = function(float $amount) use ($commissionRate) {
    return $amount * $commissionRate;
};

$fee = $calculateFee(100.0);

echo "Fee Count: $fee\n";

// App 2: The Strict Transaction Logger
// Focus: Strict Types, Nullable Returns, Named Arguments

$createLogMessage = function(string $userId, string $message, string $level = 'INFO'): ?string {
    if($level === 'LOW') {
        return null;
    }else {
        return "[INFO] User $userId: Login Success";
    }
};

$logMsg = $createLogMessage("1", "hey", "LOW");
$logMsg = $createLogMessage("2", "hey");

echo "Log Message: $logMsg\n";

// App 2: The Bulk Validator
// Focus: Variadic Functions (...) & Arrow Functions (fn)

$transactions = [100.0, -50.0, 20.0, -10.0, 12];

function sumValidTransactions(float ...$amounts): float {
    $positiveNumbers = array_filter($amounts, fn($amount) => $amount >= 0);

    return array_sum($positiveNumbers);
};

$transactionRes = sumValidTransactions(...$transactions);

echo "Sum: $transactionRes\n";


