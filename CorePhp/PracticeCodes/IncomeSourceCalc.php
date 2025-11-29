<?php

declare(strict_types=1);

$incomes = [
    ['source' => 'Salary', 'amount' => 3000, 'taxable' => true],
    ['source' => 'Freelance', 'amount' => 1000, 'taxable' => true],
    ['source' => 'Gift', 'amount' => 500, 'taxable' => false],
    ['source' => 'Pocket Money', 'amount' => 200, 'taxable' => false],
    ['source' => 'Gaming Computer', 'amount' => 2500, 'taxable' => true],
];

$taxableIncomes = array_filter($incomes, fn($inc) => $inc['taxable']);

$totalTaxPerIncome = array_map(fn($t) => $t['amount'] * 0.20, $taxableIncomes);

$totalTax = array_reduce(
    $totalTaxPerIncome,
    fn($carry, $amount) => $carry + $amount,
    0
);

print_r($totalTax);