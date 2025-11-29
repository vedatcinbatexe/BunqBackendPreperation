<?php
require_once 'PaymentProvider.php';

class CryptoPayment extends PaymentProvider {
    public function process(float $amount): string {
        return "Processed \$$amount via Bitcoin Network.\n";
    }
}
