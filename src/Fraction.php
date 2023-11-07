<?php

namespace Macocci7\PhpMathInteger;

use Macocci7\PhpMathInteger\Number;
use Macocci7\PhpMathInteger\Divisor;
use Macocci7\PhpMathInteger\Euclid;
use Macocci7\PhpMathInteger\Multiple;

class Fraction
{
    /**
     * (integer) whole numbers of the mixed fraction
     */
    public $wholeNumbers;

    /**
     * (integer) numerator of the fraction
     */
    public $numerator;

    /**
     * (integer) denominator of the fraction
     */
    public $denominator;

    /**
     * (class) instance of Macocci7\PhpMathInteger\Number
     * - for operations related with numbers
     */
    private $n;

    /**
     * (class) instance of Macocci7\PhpMathInteger\Divisor
     * - for operations related with divisors
     */
    private $d;

    /**
     * (class) instance of Macocci7\PhpMathInteger\Euclid
     * - for operations related with Euclidean Algorithm
     */
    private $e;

    /**
     * (class) instance of Macocci7\PhpMathInteger\Multiple
     * - for operations related with Multiple
     */
    private $m;

    /**
     * constructor
     */
    public function __construct(string $s = null)
    {
        $this->n = new Number();
        $this->d = new Divisor();
        $this->e = new Euclid();
        $this->m = new Multiple();
        $this->set($s);
    }

    /**
     * sets values
     * @param   string  $s
     * @return  self
     */
    public function set(string $s = null)
    {
        if (is_null($s)) {
            return;
        }
        if (preg_match("/^(\d+)\/(\d+)$/", $s, $m)) {
            $this->wholeNumbers = null;
            $this->numerator = (int) $m[1];
            $this->denominator = (int) $m[2];
        } elseif (preg_match("/^(\d+) (\d+)\/(\d+)$/", $s, $m)) {
            $this->wholeNumbers = (int) $m[1];
            $this->numerator = (int) $m[2];
            $this->denominator = (int) $m[3];
        }
        return $this;
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
     * @param   Macocci7\PhpMathInteger\Fraction    $f
     * @return  self
     */
    public function toCommonDenominator(Fraction &$f)
    {
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
     * @param
     * @return  self
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
     * substructs a fraction from this fraction
     * @param
     * @return  self
     */
    public function substruct(Fraction $f)
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
     * @param   Macocci7\PhpMathInteger\Fraction    $f
     * @return  self
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
     * @param   Macocci7\PhpMathInteger\Fraction    $f
     * @return  self
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
     * @param
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
     * @param
     * @return  self
     */
    public function mixed()
    {
        if (
            $this->n->isNaturalAll(
                [
                    $this->numerator,
                    $this->denominator,
                ]
            )
        ) {
            $w = (int) ($this->numerator / $this->denominator);
            $this->wholeNumbers += $w;
            $this->numerator -= $w * $this->denominator;
        }
        return $this;
    }

    /**
     * returns the value as a integer
     * @param
     * @return  integer
     */
    public function int()
    {
        return (int) $this->wholeNumbers;
    }

    /**
     * returns the value as a float
     * @param
     * @return  float
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
     * @param
     * @return  string|null
     */
    public function text()
    {
        if (is_null($this->numerator) || is_null($this->denominator)) {
            return;
        }
        return ($this->wholeNumbers ? $this->wholeNumbers . ' ' : '')
               . $this->numerator . '/' . $this->denominator;
    }
}
