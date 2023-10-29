<?php

namespace Macocci7\PhpMathInteger;

use Macocci7\PhpMathInteger\Prime;

class Divisor extends Prime
{
    private $divisors;

    /**
     * constructor
     */
    public function __construct()
    {
    }

    /**
     * counts the number of divisors of $n
     * @param   integer $n
     * @return  integer|null
     */
    public function count($n)
    {
        if (!$this->isNatural($n)) {
            return;
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
     * calculates divisors
     * @param   integer $v
     * @param   integer $k
     * @param   array   $e
     * @param   array   $m
     * @return  void
     */
    public function calc(int $v, int $k, array $e, array $m)
    {
        for ($i = 0; $i <= $m[$e[$k]]; $i++) {
            if ($k > 0) {
                $this->calc($v * ($e[$k] ** $i), $k - 1, $e, $m);
            } else {
                $this->divisors[] = $v * ($e[$k] ** $i);
            }
        }
    }

    /**
     * lists divisors
     * @param   integer $n
     * @return  array
     */
    public function list(int $n)
    {
        if (!$this->isNatural($n)) {
            return;
        }
        if (1 === $n) {
            return [1];
        }
        $f = $this->factors($n);
        $m = $this->countSameElements($f);
        $e = array_keys($m);
        $this->divisors = [];
        if ($n > 1) {
            $this->calc(1, count($e) - 1, $e, $m);
        } else {
            $this->divisors[] = 1;
        }
        sort($this->divisors);
        return $this->divisors;
    }

    /**
     * returns common factors
     * @param   integer $n1
     * @param   integer $n2
     * @return  array
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
        if (!$this->isIntAll([$n1, $n2])) {
            return;
        }
        if ($n1 < 2 || $n2 < 2) {
            return;
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
                $cf[$e] = ( $ex1 === $ex2 ? $ex1
                                        : ( $ex1 > $ex2 ? $ex2 : $ex1 )
                );
            }
        }
        return $cf;
    }

    public function greatestCommonFactor(int $n1, int $n2)
    {
        if ($n1 < 1 || $n2 < 1) {
            return;
        }
        $cf = $this->commonFactors($n1, $n2);
        if (is_null($cf)) {
            return;
        }
        $ec = array_keys($cf);
        $ncf = 1;
        foreach ($ec as $radix) {
            $ncf *= $radix ** $cf[$radix];
        }
        return $ncf;
    }

    public function commonDivisors(int $n1, int $n2)
    {
        if ($n1 < 1 || $n2 < 1) {
            return;
        }
        $gcf = $this->greatestCommonFactor($n1, $n2);
        return is_null($gcf) ? null : $this->list($gcf);
    }

    /**
     * removes divisors $d2 from divisors $d1
     * @param   array   $d1
     * @param   array   $d2
     * @return  array|null
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
        if (empty($d1)) {
            $d1 = [ 1 => 1, ];
        }
        return $d1;
    }

    public function reduceFraction(int $n1, int $n2)
    {
        if ($n1 < 2 || $n2 < 2) {
            return;
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
