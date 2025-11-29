<?php
require_once 'BankAccount.php';

class SavingsAccount extends BankAccount {
    private float $interestRate = 0.05;

    public function applyInterest(): void {
        $interest = $this->balance * $this->interestRate;
        $this->deposit($interest);
    }

    public function calculateMonthlyFee(): float
    {
        return 11.00;
    }
}