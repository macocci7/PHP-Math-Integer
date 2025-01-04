<?php

namespace Macocci7\PhpMathInteger;

use Macocci7\PhpMathInteger\Number;
use Macocci7\PhpMathInteger\Divisor;
use Macocci7\PhpMathInteger\Euclid;
use Macocci7\PhpMathInteger\Multiple;

/**
 * class for treating matters of fraction
 * @author  macocci7 <macocci7@yahoo.co.jp>
 * @license MIT
 */
class Fraction
{
    /**
     * whole numbers of the mixed fraction
     */
    public int|null $wholeNumbers = null;

    /**
     * numerator of the fraction
     */
    public int|null $numerator = null;

    /**
     * denominator of the fraction
     */
    public int|null $denominator = null;

    /**
     * instance of Macocci7\PhpMathInteger\Number
     * - for operations related with numbers
     */
    private Number $n;

    /**
     * instance of Macocci7\PhpMathInteger\Divisor
     * - for operations related with divisors
     */
    private Divisor $d;

    /**
     * instance of Macocci7\PhpMathInteger\Euclid
     * - for operations related with Euclidean Algorithm
     */
    private Euclid $e;

    /**
     * instance of Macocci7\PhpMathInteger\Multiple
     * - for operations related with Multiple
     */
    private Multiple $m;

    /**
     * constructor
     * @param   string|null $s = null
     */
    public function __construct(string|null $s = null)
    {
        $this->n = new Number();
        $this->d = new Divisor();
        $this->e = new Euclid();
        $this->m = new Multiple();
        if (!is_null($s)) {
            $this->set($s);
        }
    }

    /**
     * sets values
     * @param   string  $s
     * @return  self
     * @thrown  \Exception
     */
    public function set(string $s)
    {
        if (preg_match("/^(\d+)\/(\d+)$/", $s, $m)) {
            $this->wholeNumbers = null;
            $this->numerator = (int) $m[1];
            $this->denominator = (int) $m[2];
        } elseif (preg_match("/^(\d+) (\d+)\/(\d+)$/", $s, $m)) {
            $this->wholeNumbers = (int) $m[1];
            $this->numerator = (int) $m[2];
            $this->denominator = (int) $m[3];
        } else {
            throw new \Exception("Invalid string specified.");
        }
        return $this;
    }

    /**
     * judges if the fruction is reduced or not
     * @return  bool
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
     * @return  bool
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
     * @return  bool
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
     * @return  bool
     */
    public function isMixed()
    {
        return $this->wholeNumbers > 0 || $this->wholeNumbers < 0;
    }

    /**
     * reduces fraction
     * @return self
     */
    public function reduce()
    {
        if ($this->numerator > 1 && $this->denominator > 1) {
            $r = $this->d->reduceFraction(
                $this->numerator,
                $this->denominator
            );
            $this->numerator = $this->d->value($r[0]);
            $this->denominator = $this->d->value($r[1]);
        }
        return $this;
    }

    /**
     * reduces fractions to the common denominator
     * @param   Fraction    &$f
     * @return  self
     * @thrown  \Exception
     */
    public function toCommonDenominator(Fraction &$f)
    {
        if (0 === (int) $this->denominator || 0 === (int) $f->denominator) {
            throw new \Exception('denominator must not be null nor zero.', 1);
        }
        $cd = $this->m->leastCommonMultiple(
            $this->denominator,
            $f->denominator
        );
        $r1 = (int) ($cd / $this->denominator);
        $r2 = (int) ($cd / $f->denominator);
        $this->denominator = $cd;
        $this->numerator *= $r1;
        $f->denominator = $cd;
        $f->numerator *= $r2;
        return $this;
    }

    /**
     * adds a fraction to this fraction
     * @param   Fraction    $f
     * @return  self
     * @thrown  \Exception
     */
    public function add(Fraction $f)
    {
        if (0 === (int) $this->denominator || 0 === (int) $f->denominator) {
            throw new \Exception('denominator must not be null nor zero.', 1);
        }
        $this->improper();
        $f->improper();
        $this->toCommonDenominator($f);
        $this->numerator += $f->numerator;
        $this->reduce();
        return $this;
    }

    /**
     * substracts a fraction from this fraction
     * @param   Fraction    $f
     * @return  self
     * @thrown  \Exception
     */
    public function substract(Fraction $f)
    {
        if (0 === (int) $this->denominator || 0 === (int) $f->denominator) {
            throw new \Exception('denominator must not be null nor zero.', 1);
        }
        $this->improper();
        $f->improper();
        $this->toCommonDenominator($f);
        $this->numerator -= $f->numerator;
        $this->improper();
        $sign = $this->numerator > 0 ? 1 : -1;
        $this->numerator *= $sign;
        $this->reduce();
        $this->numerator *= $sign;
        return $this;
    }

    /**
     * multiply this fraction by a fraction $f
     * @param   Fraction    $f
     * @return  self
     * @thrown  \Exception
     */
    public function multiply(Fraction $f)
    {
        if (0 === (int) $this->denominator || 0 === (int) $f->denominator) {
            throw new \Exception('denominator must not be null nor zero.', 1);
        }
        $this->improper();
        $this->reduce();
        $f->improper();
        $f->reduce();
        $this->numerator *= $f->numerator;
        $this->denominator *= $f->denominator;
        $this->reduce();
        return $this;
    }

    /**
     * divide this fraction by a fraction $f
     * @param   Fraction    $f
     * @return  self
     * @thrown  \Exception
     */
    public function divide(Fraction $f)
    {
        if (0 === (int) $this->denominator || 0 === (int) $f->denominator) {
            throw new \Exception('denominator must not be null nor zero.', 1);
        }
        if (0 === (int) $f->numerator) {
            throw new \Exception('divisor must not be null nor zero.', 2);
        }
        $this->improper();
        $this->reduce();
        $f->improper();
        $f->reduce();
        $this->numerator *= $f->denominator;
        $this->denominator *= $f->numerator;
        $this->reduce();
        return $this;
    }

    /**
     * converts the fraction into a improper fraction
     * @return  self
     */
    public function improper()
    {
        if (
            $this->n->isNaturalAll(
                [
                    $this->wholeNumbers,
                    $this->numerator,
                    $this->denominator,
                ]
            )
        ) {
            $this->numerator += $this->wholeNumbers * $this->denominator;
            $this->wholeNumbers = null;
        }
        return $this;
    }

    /**
     * converts the fraction into a mixed fraction
     * @return  self
     */
    public function mixed()
    {
        if (
            $this->n->isInt($this->numerator)
            && $this->n->isNatural($this->denominator)
        ) {
            $w = (int) ($this->numerator / $this->denominator);
            $s = $this->n->sign($this->wholeNumbers);
            $s = $s > 0 || $s < 0 ? $s : 1;
            $this->wholeNumbers += $s * $w;
            $this->numerator -= $w * $this->denominator;
        }
        return $this;
    }

    /**
     * returns the value as a integer
     * @return  int|null
     */
    public function int()
    {
        $w = $this->wholeNumbers;
        $n = $this->numerator;
        $d = $this->denominator;
        if (!$this->n->isInt($n) || !$this->n->isNatural($d)) {
            return null;
        }
        $i = $this->mixed()->wholeNumbers;
        $this->wholeNumbers = $w;
        $this->numerator = $n;
        $this->denominator = $d;
        return $i;
    }

    /**
     * returns the value as a float
     * @return  float|null
     */
    public function float()
    {
        return 0 === (int) $this->denominator
               ? null // numbers must not be divided by zero
               : (float) (
                    (int) $this->wholeNumbers
                    + (int) $this->numerator / (int) $this->denominator
               );
    }

    /**
     * returns the fraction as one-line-text
     * @return  string|null
     */
    public function text()
    {
        if (is_null($this->numerator) || is_null($this->denominator)) {
            return null;
        }
        return ($this->wholeNumbers ? $this->wholeNumbers . ' ' : '')
               . $this->numerator . '/' . $this->denominator;
    }
}
