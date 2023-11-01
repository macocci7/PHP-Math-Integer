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

    public function isReduced()
    {
        return 1 === $this->numerator && 1 === $this->denominator
               ? true
               : $this->e->isCoprime($this->numerator, $this->denominator)
               ;
    }

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

    public function isMixed()
    {
        return $this->wholeNumbers > 0;
    }

    public function reduce()
    {
        $r = $this->reduceFraction($this->numerator, $this->denominator);
        $this->numerator = $r[0];
        $this->denominator = $r[1];
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
