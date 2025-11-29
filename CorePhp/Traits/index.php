<?php
require 'HasId.php';

class User {
    use HasId;
    public function __construct(public string $username) {
        $this->generateId();
    }
}

class Shoe {
    use HasId;

    public function __construct(public string $brand) {
        $this->generateId();
    }
}

$vedat = new User("Vedat");
$nike = new Shoe("Nike");

echo "User ID: " . $vedat->getId() . "\n";

echo "Shoe ID: " . $nike->getId() . "\n";

class Base {
    public function sayHello() { echo "Hello from Base"; }
}

trait Greeter {
    public function sayHello() { echo "Hello from Trait"; }
}

class Child extends Base {
    use Greeter;
    // This sayHello() defined will be more important | than trait implementation | than parent implementation
    //public function sayHello() { echo "Hello from Child"; }
}

$obj = new Child();
$obj->sayHello();


class FinancialRecord { /* ... core banking logic ... */ }
class SecurityEvent { /* ... core security logic ... */ }

trait Auditable {
    public function logAction($name) {
        $timestamp = date('Y-m-d H:i:s');
        echo "[AUDIT LOG]: Action '$name' - $timestamp\n";
    }
}

// CLASS 1: Handling Money
class MoneyTransfer extends FinancialRecord {
    use Auditable;
    public function transfer(float $amount) {
        echo "Transferred $amount EUR.\n";
        $this->logAction('Transfer');
    }
}

// CLASS 2: Handling Logins
class UserLogin extends SecurityEvent {
    use Auditable;
    public function login(string $username) {
        echo "User $username logged in.\n";
        $this->logAction('Login');
    }
}


$transfer = new MoneyTransfer();
$transfer->transfer(500);

$login = new UserLogin();
$login->login("Vedat");