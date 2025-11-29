<?php

class Price {
    public function __construct(public float $amount, public string $currency) {}

    public function __toString(): string {
        return $this->amount . " " . $this->currency;
    }
}

$p = new Price(50.00, 'EUR');

echo "The price is: " . $p;
