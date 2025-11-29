<?php

declare(strict_types=1);

$transactions = array(
    ['type' => 'withdrawal', 'amount' => 100, 'status' => 'processed'],
    ['type' => 'deposit', 'amount' => 200],
    ['type' => 'deposit', 'amount' => 300, 'status' => 'pending'],
    ['type' => 'transfer', 'amount' => 400, 'status' => 'processed'],
);

foreach($transactions as &$t) {
    $t['status'] ??= 'processed';

    if($t['status'] === 'processed') {
        $fee = match ($t['type']) {
            'withdrawal' => 2.50,
            'deposit' => 0.00,
            'transfer' => 1.00,
            default => 5.0,
        };

        $t['amount'] -= $fee;
    }
}
unset($t);

print_r($transactions);

