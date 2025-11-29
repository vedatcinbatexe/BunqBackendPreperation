<?php
require_once 'Product.php';

class Shoe extends Product
{
    public function __construct(
        string $name,
        float $price,
        public int $size,
    ){
        parent::__construct($name, $price);
    }

    public function getDetails(): string {
        $basicInfo = parent::getDetails();
        return "{$basicInfo} (Size: {$this->size})}";
    }
}