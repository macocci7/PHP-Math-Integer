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

    /**
     * judges if $n is integer or not
     * @param   mixed   $n
     * @return  boolean
     */
    public function isInt($n)
    {
        return (int) $n === $n;
    }

    /**
     * judges if the all elements of $ns are integer or not
     * @param   array   $ns
     * @return  boolean
     */
    public function isIntAll(array $ns)
    {
        foreach ($ns as $n) {
            if (!$this->isInt($n)) {
                return false;
            }
        }
        return count($ns) > 0;
    }

    /**
     * judges if $n is natural number or not
     * @param   mixed   $n
     * @return  boolean
     */
    public function isNatural($n)
    {
        if (!$this->isInt($n)) {
            return false;
        }
        return $n > 0;
    }

    /**
     * judges if the all elements of $ns are natural number or not
     * @param   array   $ns
     * @return  boolean
     */
    public function isNaturalAll(array $ns)
    {
        foreach ($ns as $n) {
            if (!$this->isNatural($n)) {
                return false;
            }
        }
        return count($ns) > 0;
    }

    /**
     * judges $n is float or not
     * @param   mixed   $n
     * @return  boolean
     */
    public function isFloat($n)
    {
        return (float) $n === $n;
    }

    /**
     * judges if the all elements of $ns are float or not
     * @param   array   $ns
     * @return  boolean
     */
    public function isFloatAll(array $ns)
    {
        foreach ($ns as $n) {
            if (!$this->isFloat($n)) {
                return false;
            }
        }
        return count($ns) > 0;
    }

    /**
     * judges if $n is number or not
     * @param   mixed   $n
     * @return  boolean
     */
    public function isNumber($n)
    {
        return $this->isInt($n) || $this->isFloat($n);
    }

    /**
     * judges if the all elements of $ns are number of not
     * @param   array   $ns
     * @return  boolean
     */
    public function isNumberAll(array $ns)
    {
        foreach ($ns as $n) {
            if (!$this->isNumber($n)) {
                return false;
            }
        }
        return count($ns) > 0;
    }

    /**
     * judges if $n is decimal fraction or not
     * @param   mixed   $n
     * @return  boolean
     */
    public function isFraction($n)
    {
        if (!$this->isFloat($n)) {
            return false;
        }
        return abs($n) > 0 && abs($n) < 1;
    }

    /**
     * judges if the all elements of $ns are fraction or not
     * @param   array   $ns
     * @return  boolean
     */
    public function isFractionAll(array $ns)
    {
        foreach ($ns as $n) {
            if (!$this->isFraction($n)) {
                return false;
            }
        }
        return count($ns) > 0;
    }

    /**
     * returns sign of $n as one of [ -1, 0, 1, ]
     * @param   mixed   $n
     * @return  integer|null
     */
    public function sign($n)
    {
        if (!$this->isNumber($n)) {
            return;
        }
        return $n > 0 ? 1 : ($n < 0 ? -1 : 0);
    }

    /**
     * returns integer part of $n
     * @param   float   $n
     * @return  integer|null
     */
    public function int(float $n)
    {
        return (int) $n;
    }

    /**
     * returns fraction part of $n
     * @param   float   $n
     * @return  boolean
     */
    public function fraction(float $n)
    {
        return (float) ($n - $this->int($n));
    }

    /**
     * retruns ($n)th digit of $d
     * @param   integer $n
     * @param   mixed   $d
     * @return  integer|null
     */
    public function nthDigit(int $n, $d)
    {
        if (!$this->isNumber($d)) {
            return;
        }
        if ($n > 0) {
            // integer part
            $s = (string) $this->int(abs($d));
            if ($n > strlen($s)) {
                return;
            }
            return (int) substr($s, -$n, 1);
        } elseif ($n < 0) {
            // fraction part
            $s = (string) $this->fraction(abs($d));
            if (-$n > strlen($s) - 2) {
                return;
            }
            return (int) substr($s, 1 - $n, 1);
        }
        return;
    }

    /**
     * returns the number of digits of $n
     * @param   mixed   $n
     * @return  integer|null
     */
    public function numberOfDigits($n)
    {
        if (!$this->isNumber($n)) {
            return;
        }
        return strlen((string) abs($this->int($n)));
    }

    /**
     * returns the number of fractional digits of $n
     * @param   float   $n
     * @return  integer
     */
    public function numberOfFractionalDigits(float $n)
    {
        if (strcmp("0", (string) $this->fraction($n)) === 0) {
            return 0;
        }
        return strlen((string) $this->fraction(abs($n))) - 2;
    }
}
