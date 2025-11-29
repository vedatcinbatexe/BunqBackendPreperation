<?php

declare(strict_types=1);

$apiResponse = 'PAYMENT_SUCCESS';

switch($apiResponse) {
    case 'PAYMENT_SUCCESS':
        $msg = "Money sent";
        break;

    case 'PAYMENT_FAILED':
        $msg = "Money returned.";
        break;
}

$userMessage = match ($apiResponse) {
    'PAYMENT_SUCCESS', 'PAYMENT_PENDING' => 'Transaction Processed',
    'PAYMENT_FAILED' => 'Transaction declined',
    'PAYMENT_FRAUD' => 'Account frozen',
    default => 'Unknown Error',
};

echo "Result: $userMessage\n";

$errorMessage = "Database Down";

$log = $errorMessage ?: "OK";

echo "Log: $log\n";