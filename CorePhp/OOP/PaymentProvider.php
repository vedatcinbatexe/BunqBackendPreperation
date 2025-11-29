<?php

abstract class PaymentProvider {
    public function logTransaction(): void {
        echo "Logging transaction to database...\n";
    }

    abstract public function process(float $amount): string;
}
