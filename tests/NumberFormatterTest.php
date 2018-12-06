<?php
/**
 * Created by PhpStorm.
 * User: ovidijus
 * Date: 18.12.6
 * Time: 12.54
 */

namespace App\Tests;


use App\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase
{

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            ['2.84M', 2835779],
            ['1.00M', 999500],
            ['535K', 535216],
            ['100K', 99950],
            ['27 534', 27533.78],
            ['1 000', 999.9999],
            ['533.10', 533.1],
            ['66.67', 66.6666],
            ['12.00', 12],
            ['-12.00', -12],
            ['-13.01', -13.01],
            ['-124K', -123654.89],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param string $expectedValue
     * @param float $givenValue
     */
    public function testFormatNumber(string $expectedValue, float $givenValue)
    {
        $numberFormatter = new NumberFormatter();
        $this->assertEquals($expectedValue, ($numberFormatter->format($givenValue)));
    }
}