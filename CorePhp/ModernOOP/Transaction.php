<?php

enum Currency: string {
    case EUR = "EUR";

    case USD = "USD";

    case TRY  = "TRY";
}

class Transaction {
    public function __construct(
        public readonly float $amount,
        public readonly Currency $currency
    ) {}

    public function getFee(): float {
        return match($this->currency) {
            Currency::EUR => 0.5,
            Currency::USD => 1.0,
            Currency::TRY => 0.0,
        };

    }
}

$t1 = new Transaction(100, Currency::EUR);
$t2 = new Transaction(350, Currency::USD);
$t3 = new Transaction(12000, Currency::TRY);

echo "Transaction Fee 1 : " . $t1->getFee() . "\n";
echo "Transaction Fee 2 : " . $t2->getFee() . "\n";
echo "Transaction Fee 3 : " . $t3->getFee() . "\n";


