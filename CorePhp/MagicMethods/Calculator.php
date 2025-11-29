<?php

class Calculator {
    public function __invoke($a, $b) {
        return $a + $b;
    }
}

$calc = new Calculator();

echo $calc(5,10);