<?php

class Wallet {
    private array $data = [];

    // EVENT: Triggers when you assign a value to a non-existent property
    public function __set($name, $value) {
        if ($name === 'balance' && $value < 0) {
            throw new Exception("Balance cannot be negative!");
        }

        $this->data[$name] = $value;
    }

    public function __get($name) {
        return $this->data[$name] ?? null;
    }
}

$myWallet = new Wallet();
$myWallet->balance = 100; // Works fine
echo $myWallet->__get('balance');
//$myWallet->balance = -50; // Crash!
// $myWallet->balance = -50; // CRASH! The exception stops it.
