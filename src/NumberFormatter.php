<?php
/**
 * Created by PhpStorm.
 * User: ovidijus
 * Date: 18.12.6
 * Time: 12.11
 */

namespace App;

class NumberFormatter
{
    /**
     * @var $number
     */
    private $number;

    /**
     * @return string
     */
    private function getMilionsFormat(): string
    {
        return number_format($this->number / 1000000, 2) . 'M';
    }

    /**
     * @return string
     */
    private function getThousandthsFormat(): string
    {
        return number_format($this->number / 1000) . 'K';
    }

    /**
     * @return string
     */
    private function getThousandsFormat(): string
    {
        return number_format($this->number, 0, '.', ' ');
    }

    /**
     * @return string
     */
    private function formatDefault(): string
    {
        return floor($this->number) === $this->number ? round($this->number) : number_format($this->number, 2);
    }

    /**
     * @param float $number
     * @return string
     */
    public function format(float $number): string
    {
        $this->number = $number;

        if (abs($number) >= 999500){
            return $this->getMilionsFormat();
        }elseif (abs($number) >= 99950){
            return $this->getThousandthsFormat();
        }elseif (abs($number) >= 999.9999){
            return $this->getThousandsFormat();
        }else{
            return $this->formatDefault();
        }
    }
}