<?php

namespace Macocci7\PhpMathInteger;

use Macocci7\PhpMathInteger\Prime;

/**
 * class for treating matters of divisors
 * @author  macocci7 <macocci7@yahoo.co.jp>
 * @license MIT
 * @SuppressWarnings(PHPMD.ElseExpression)
 */
class Divisor extends Prime
{
    /**
     * @var int[]   $divisors
     */
    private array $divisors;

    /**
     * constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * counts the number of divisors of $n
     * @param   int         $n
     * @return  int|null
     */
    public function count(int $n)
    {
        if (!$this->isNatural($n)) {
            return null;
        }
        if (1 === $n) {
            return 1;
        }
        $f = $this->countSameElements($this->factors($n));
        $c = 1;
        foreach (array_keys($f) as $e) {
            $c *= $f[$e] + ( $e > 1 ? 1 : 0 );
        }
        return $c;
    }

    /**
     * retrun value from factors
     * @param   array<int, int>     $factors
     * @return  int|null
     */
    public function value(array $factors)
    {
        if (empty($factors)) {
            return null;
        }
        /**
         * the structure of $factors must be as follows
         * array [
         *      radix1 => exp1,
         *      radix2 => exp2,
         *      ...,
         * ]
         *
         * ex)
         * [
         *      2 => 3,
         *      3 => 2,
         *      5 => 1,
         * ]
         *
         * this factors results in:
         *
         * (2 ** 3) * (3 ** 2) * (5 ** 1)
         * = 8 * 9 * 5
         * = 360
         */
        $v = 1;
        foreach ($factors as $radix => $exp) {
            if ($radix === 0) {
                return null;
            }
            $v *= $radix ** $exp;
        }
        return $v;
    }

    /**
     * returns the formula with prime factors of $n
     * @param   int         $n
     * @return  string|null
     */
    public function formula(int $n)
    {
        if (!$this->isNatural($n)) {
            return null;
        }
        if (1 === $n) {
            return '1';
        }
        $f = [];
        foreach ($this->countSameElements($this->factors($n)) as $r => $e) {
            $f[] = $r . ($e > 1 ? ' ^ ' . $e : '');
        }
        return implode(' * ', $f);
    }

    /**
     * calculates divisors recursively
     * @param   int             $v
     * @param   int             $k
     * @param   int[]           $e
     * @param   array<int, int> $m
     * @return  void
     */
    private function calcR(int $v, int $k, array $e, array $m)
    {
        for ($i = 0; $i <= $m[$e[$k]]; $i++) {
            if ($k > 0) {
                $this->calcR($v * ($e[$k] ** $i), $k - 1, $e, $m);
            } else {
                $this->divisors[] = $v * ($e[$k] ** $i);
            }
        }
    }

    /**
     * lists divisors
     * @param   int     $n
     * @return  int[]|null
     */
    public function list(int $n)
    {
        if (!$this->isNatural($n)) {
            return null;
        }
        if (1 === $n) {
            return [1];
        }
        $f = $this->factors($n);
        $m = $this->countSameElements($f);
        $e = array_keys($m);
        $this->divisors = [];
        if ($n > 1) {
            $this->calcR(1, count($e) - 1, $e, $m);
        } else {
            $this->divisors[] = 1;
        }
        sort($this->divisors);
        return $this->divisors;
    }

    /**
     * returns common factors
     * @param   int     $n1
     * @param   int     $n2
     * @return  array<int, int>|null
     */
    public function commonFactors(int $n1, int $n2)
    {
        /**
         * ex)
         * commonFactors(72, 108)
         * results in
         * [ 2 => 2, 3 => 2 ]
         * --------------------------
         * 72 = (2 ** 3) * (3 ** 2)
         * 108 = (2 ** 2) * (3 ** 3)
         * ==> common factors: (2 ** 2) * (3 ** 2)
         */
        if ($n1 < 2 || $n2 < 2) {
            return null;
        }
        $f1 = $this->factors($n1);
        $f2 = $this->factors($n2);
        $m1 = $this->countSameElements($f1);
        $m2 = $this->countSameElements($f2);
        $elements = array_keys($m1);
        $cf = [];
        foreach ($elements as $e) {
            if (array_key_exists($e, $m2)) {
                $ex1 = $m1[$e];
                $ex2 = $m2[$e];
                $cf[$e] = $ex1 === $ex2
                        ? $ex1
                        : ( $ex1 > $ex2 ? $ex2 : $ex1 )
                        ;
            }
        }
        return $cf;
    }

    /**
     * returns the greatest common factor
     * @param   int         $n1
     * @param   int         $n2
     * @return  int|null
     */
    public function greatestCommonFactor(int $n1, int $n2)
    {
        if ($n1 < 1 || $n2 < 1) {
            return null;
        }
        $cf = $this->commonFactors($n1, $n2);
        if (is_null($cf)) {
            return null;
        }
        $ec = array_keys($cf);
        $ncf = 1;
        foreach ($ec as $radix) {
            $ncf *= $radix ** $cf[$radix];
        }
        return $ncf;
    }

    /**
     * returns common divisors
     * @param   int         $n1
     * @param   int         $n2
     * @return  int[]|null
     */
    public function commonDivisors(int $n1, int $n2)
    {
        if ($n1 < 1 || $n2 < 1) {
            return null;
        }
        $gcf = $this->greatestCommonFactor($n1, $n2);
        return is_null($gcf) ? null : $this->list($gcf);
    }

    /**
     * removes divisors $d2 from divisors $d1
     * @param   array<int, int>         $d1
     * @param   array<int, int>         $d2
     * @return  array<int, int>|null
     */
    public function removeDivisors(array $d1, array $d2)
    {
        if (empty($d1) || empty($d2)) {
            return $d1;
        }
        foreach (array_keys($d2) as $radix) {
            if (array_key_exists($radix, $d1)) {
                if ($d1[$radix] > $d2[$radix]) {
                    $d1[$radix] -= $d2[$radix];
                } else {
                    unset($d1[$radix]);
                }
            }
        }
        return empty($d1) ? [ 1 => 1, ] : $d1;
    }

    /**
     * reduces fraction
     * @param   int         $n1
     * @param   int         $n2
     * @return  array<int, array<int, int>>|null
     */
    public function reduceFraction(int $n1, int $n2)
    {
        if ($n1 < 2 || $n2 < 2) {
            return null;
        }
        $f1 = $this->factors($n1);
        $f2 = $this->factors($n2);
        $m1 = $this->countSameElements($f1);
        $m2 = $this->countSameElements($f2);
        $cf = $this->commonFactors($n1, $n2);
        return [
            $this->removeDivisors($m1, $cf),
            $this->removeDivisors($m2, $cf),
        ];
    }
}
