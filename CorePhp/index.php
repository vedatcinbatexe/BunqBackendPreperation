<?php

declare(strict_types=1);


// -- VARIABLES --
$name = "Vedat"; // String
$balance = 1050.50; // Float
$isActive = true; // Bool

// -- CONSTANTS --
const CURRENCY = 'EUR';
define('API_KEY', 'xyz'); // Runtime constant

// -- STRINGS --
echo "User: $name, Balance: $balance" . PHP_EOL;

echo 'User: $name';

// -- OPERATORS --
// === Checks value AND type. 0 == false is true, but 0 === false is false
// ??= if variable is not set, setit to x
// <=> returns -1,0,1. Used for custom logic
