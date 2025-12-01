<?php

require 'BankAccount.php';
require 'SavingsAccount.php';
require 'Shoe.php';
require 'CryptoPayment.php';
require 'StripePayment.php';
require 'EmailNotifier.php';
require 'SmsNotifier.php';
require 'UserControllerTest.php';

/*$myAccount = new SavingsAccount("Vedat Cinbat", 100.00);

echo BankAccount::CURRENCY;

$myAccount->deposit(50);

echo $myAccount->getBalance();

echo "\n";

$savings = new SavingsAccount('Vedat Cinbat - Saving', 10);

$savings->deposit(50);

$savings->applyInterest();

echo $savings->getBalance();*/

/*$sneaker = new Shoe("Nike Air", 120.00, 42);
$sneaker = new Shoe("Adidas Max", 230.00, 41);

echo $sneaker->getDetails();*/


/*function handleCheckout(PaymentProvider $provider, float $amount): void {
    $provider->logTransaction();
    echo $provider->process($amount);
};

$myCard = new StripePayment();
$myWallet = new CryptoPayment();

handleCheckout($myCard, 50.00);
handleCheckout($myWallet, 100.00);*/


$emailService = new EmailNotifier();
$userA = new UserControllerTest($emailService);
$userA->notifyUser("Welcome!");

echo "\n";

$smsService = new SmsNotifier();
$userB = new UserControllerTest($smsService);
$userB->notifyUser("Your code is 1234!");










