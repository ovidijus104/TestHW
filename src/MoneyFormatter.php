<?php
/**
 * Created by PhpStorm.
 * User: ovidijus
 * Date: 18.12.6
 * Time: 12.12
 */

namespace App;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MoneyFormatter extends Controller
{
    /**s
     * @var NumberFormatter $numberFormatter
     */
    private $numberFormatter;


    /**
     * MoneyFormatter constructor.
     * @param $numberFormatter
     */
    public function __construct(NumberFormatter $numberFormatter)
    {
        $this->numberFormatter = $numberFormatter;
    }

    /**
     * @param float $number
     * @return string
     */
    public function formatEur(float $number): string
    {
        return $this->numberFormatter->format($number). ' €';
    }

    /**
     * @param float $number
     * @return string
     */
    public function formatUsd(float $number): string
    {
        return '$' .$this->numberFormatter->format($number);
    }
}