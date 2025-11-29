<?php

require 'BankAccount.php';
require 'SavingsAccount.php';

$myAccount = new BankAccount("Vedat Cinbat", 100.00);

echo BankAccount::CURRENCY;

$myAccount->deposit(50);

echo $myAccount->getBalance();

echo "\n";

$savings = new SavingsAccount('Vedat Cinbat - Saving', 10);

$savings->deposit(50);

$savings->applyInterest();

echo $savings->getBalance();