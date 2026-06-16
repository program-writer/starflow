<?php

namespace Tests\Unit;

use App\Services\PriceCalculator;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PriceCalculatorTest extends TestCase
{
    #[DataProvider('prices')]
    public function test_calculates_total(
        float $price,
        int $qty,
        float $expected
    ): void
    {
        $calculator = new PriceCalculator();
        $result = $calculator->calculate($price, $qty);
        $this->assertEquals($expected, $result);
    }

    public static function prices(): array
    {
        return [
            [100, 1, 100],
            [100, 5, 500],
            [199.99, 3, 599.97],
        ];
    }
}
