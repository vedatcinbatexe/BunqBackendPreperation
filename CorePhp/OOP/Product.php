<?php

class Product
{
    public function __construct(
        protected string $name,
        protected float $price
    ) {}

    public function getDetails(): string {
        return "{$this->name}: {$this->price}";
    }
}