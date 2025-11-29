<?php

require_once 'PaymentProvider.php';

class StripePayment extends PaymentProvider {
    public function process(float $amount): string {
        return "Processed \$$amount via Stripe (Credit Card).\n";
    }
}
