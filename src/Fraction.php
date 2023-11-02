<?php

namespace Macocci7\PhpMathInteger;

use Macocci7\PhpMathInteger\Divisor;
use Macocci7\PhpMathInteger\Euclid;

class Fraction extends Divisor
{
    public $wholeNumbers;

    public $numerator;

    public $denominator;

    private $e; // Macocci7\PhpMathInteger\Euclid

    /**
     * constructor
     */
    public function __construct()
    {
        $this->e = new Euclid();
    }

    /**
     * judges if the fruction is reduced or not
     * @param
     * @return  boolean
     */
    public function isReduced()
    {
        return 1 === $this->numerator && 1 === $this->denominator
               ? true
               : $this->e->isCoprime($this->numerator, $this->denominator)
               ;
    }

    /**
     * judges if the fruction is proper ot not
     * @param
     * @return  boolean
     */
    public function isProper()
    {
        return !is_null($this->wholeNumbers)
               ? false
               : (
                    $this->numerator > 0 && $this->denominator > 0
                    ? $this->numerator < $this->denominator
                    : false
                 )
               ;
    }

    /**
     * judges if the fraction is improper or not
     * @param
     * @return  boolean
     */
    public function isImproper()
    {
        return !is_null($this->wholeNumbers)
               ? false
               : (
                    $this->numerator > 0 && $this->denominator > 0
                    ? $this->numerator > $this->denominator
                    : false
                 )
               ;
    }

    /**
     * judges if the fraction is mixed or not
     * @param
     * @return  boolean
     */
    public function isMixed()
    {
        return $this->wholeNumbers > 0 || $this->wholeNumbers < 0;
    }

    /**
     * reduces fraction
     * @param
     * @return self
     */
    public function reduce()
    {
        if ($this->numerator > 0 && $this->denominator > 0) {
            $r = $this->reduceFraction($this->numerator, $this->denominator);
            $this->numerator = $r[0];
            $this->denominator = $r[1];
        }
        return $this;
    }

    public function add()
    {
    }

    public function substruct()
    {
    }

    public function multiply()
    {
    }

    public function divide()
    {
    }

    public function improper()
    {
    }

    public function mixed()
    {
    }

    public function words()
    {
    }

    public function wordsWithOver()
    {
    }

    public function wordsWithDivided()
    {
    }
}
