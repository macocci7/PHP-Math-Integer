<?php

namespace Macocci7\PhpMathInteger;

class Number
{
    /**
     * constructor
     */
    public function __construct()
    {
    }

    public function isInt($n)
    {
        return (int) $n === $n;
    }

    public function isIntAll(array $ns)
    {
        $r = (int) (count($ns) > 0);
        foreach ($ns as $n) {
            $r *= (int) $this->isInt($n);
        }
        return (bool) $r;
    }

    public function isNatural($n)
    {
        if (!$this->isInt($n)) {
            return false;
        }
        return $n > 0;
    }

    public function isNaturalAll(array $ns)
    {
        $r = (int) (count($ns) > 0);
        foreach ($ns as $n) {
            $r *= (int) $this->isNatural($n);
        }
        return (bool) $r;
    }

    public function isFloat($n)
    {
        return (float) $n === $n;
    }

    public function isFloatAll(array $ns)
    {
        $r = (int) (count($ns) > 0);
        foreach ($ns as $n) {
            $r *= (int) $this->isFloat($n);
        }
        return (bool) $r;
    }

    public function isNumber($n)
    {
        return $this->isInt($n) || $this->isFloat($n);
    }

    public function isNumberAll(array $ns)
    {
        $r = (int) (count($ns) > 0);
        foreach ($ns as $n) {
            $r *= (int) $this->isNumber($n);
        }
        return (bool) $r;
    }

    public function isPositive($n)
    {
    }

    public function getNthDigit($n, $d)
    {
    }

    public function getNumberOfDigits($n)
    {
    }
}
