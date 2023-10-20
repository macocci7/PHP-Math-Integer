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

    public function isFraction($n)
    {
        if (!$this->isFloat($n)) {
            return false;
        }
        return abs($n) > 0 && abs($n) < 1;
    }

    public function getSign($n)
    {
        if (!$this->isNumber($n)) {
            return;
        }
        return $n > 0 ? 1 : ($n < 0 ? -1 : 0);
    }

    public function getInt($n)
    {
        if (!$this->isNumber($n)) {
            return;
        }
        return (int) $n;
    }

    public function getFraction($n)
    {
        if (!$this->isNumber($n)) {
            return;
        }
        return (float) ($n - $this->getInt($n));
    }

    public function getNthDigit(int $n, $d)
    {
        if (!$this->isNumber($d)) {
            return;
        }
        if ($n > 0) {
            // integer part
            $s = (string) $this->getInt(abs($d));
            if ($n > strlen($s)) {
                return;
            }
            return (int) substr($s, -$n, 1);
        } elseif ($n < 0) {
            // fraction part
            $s = (string) $this->getFraction(abs($d));
            if (-$n > strlen($s) - 2) {
                return;
            }
            return (int) substr($s, 1 - $n, 1);
        }
        return;
    }

    public function getNumberOfDigits($n)
    {
        if (!$this->isNumber($n)) {
            return;
        }
        return strlen((string) abs($this->getInt($n)));
    }

    public function getNumberOfFractionalDigits($n)
    {
        if (!$this->isNumber($n)) {
            return;
        }
        if ($this->isInt($n)) {
            return 0;
        }
        if (strcmp("0", (string) $this->getFraction($n)) === 0) {
            return 0;
        }
        return strlen((string) $this->getFraction(abs($n))) - 2;
    }
}
