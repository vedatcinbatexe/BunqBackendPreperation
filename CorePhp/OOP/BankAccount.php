<?php

class BankAccount {
    public const CURRENCY = 'USD';

    public string $accountHolder;
    protected float $balance;

    // OLD WAY
    public function __construct(string $name, float $startingBalance) {
        $this->accountHolder = $name;
        $this->balance = $startingBalance;
    }

    // NEW WAY
    /*public function __construct(
        string $name,
        float $balance
    ) {}*/

    public function deposit(float $amount) {
        if($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function getBalance(): float {
        return $this->balance;
    }
}
