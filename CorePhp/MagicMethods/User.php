<?php

class User {
    public function __construct(public string $name, public int $age) {}

    public function __toString(): string {
        return "User: {$this->name} is {$this->age} years old.";
    }
}
