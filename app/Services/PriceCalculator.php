<?php

namespace App\Services;

class PriceCalculator
{
    public function calculate(float $price, int $qty): float
    {
        return $price * $qty;
    }
}
