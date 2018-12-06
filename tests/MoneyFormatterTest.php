<?php
/**
 * Created by PhpStorm.
 * User: ovidijus
 * Date: 18.12.6
 * Time: 12.50
 */

namespace App\Tests;

use App\MoneyFormatter;
use App\NumberFormatter;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MoneyFormatterTest extends TestCase
{
    /** @var NumberFormatter|MockObject $numberFormatter */
    private $numberFormatter;


    /**
     * @dataProvider dataProviderEur
     * @param string $expectedValue
     * @param float $givenValue
     */
    public function testFormatEur(string $expectedValue, float $givenValue)
    {
        $this->numberFormatter = $this->createMock(NumberFormatter::class);

        $this->numberFormatter->expects($this->at(0))
            ->method('format')
            ->with($givenValue)
            ->willReturn(rtrim($expectedValue, ' €'));

        $moneyFormatter = new MoneyFormatter($this->numberFormatter);

        $this->assertEquals($expectedValue, $moneyFormatter->formatEur($givenValue));
    }

    /**
     * @dataProvider dataProviderUsd
     * @param string $expectedValue
     * @param float $givenValue
     */
    public function testFormatUsd(string $expectedValue, float $givenValue)
    {
        $this->numberFormatter = $this->createMock(NumberFormatter::class);

        $this->numberFormatter->expects($this->at(0))
            ->method('format')
            ->with($givenValue)
            ->willReturn(str_replace('$', '', $expectedValue));

        $moneyFormatter = new MoneyFormatter($this->numberFormatter);

        $this->assertEquals($expectedValue, $moneyFormatter->formatUsd($givenValue));
    }


    public function dataProviderEur(): array
    {
        return [
            ['2.84M €', 2835779],
            ['211.99 €', 211.99],
        ];
    }

    public function dataProviderUsd(): array
    {
        return [
            ['$2.84M', 2835779],
            ['$211.99', 211.99],
        ];
    }




}