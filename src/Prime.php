<?php

namespace Macocci7\PhpMathInteger;

use Macocci7\PhpMathInteger\Number;

class Prime extends Number
{
    /**
     * constructor
     */
    public function __construct()
    {
    }

    /**
     * judges if the number is prime or not
     * @param   integer $n
     * @return  bool
     */
    public function isPrime(int $n)
    {
        if ($n < 2) {
            return false;
        }
        for ($i = 2; $i <= sqrt($n); $i++) {
            if ($n % $i === 0) {
                return false;
            }
        }
        return true;
    }

    /**
     * judges if all elements of the array are primes or not
     * @param   array   $elements
     * @return  bool
     */
    public function isPrimeAll(array $elements) {
        if (count($elements) < 1) {
            return false;
        }
        foreach ($elements as $e) {
            if (!$this->isPrime($e)) {
                return false;
            }
        }
        return true;
    }

    /**
     * returns the next prime
     * @param   integer $n
     * @return  integer
     */
    public function next(int $n)
    {
        $i = $n > 1 ? $n + 1 : 2;
        while (!$this->isPrime($i)) {
            $i++;
        }
        return $i;
    }

    /**
     * returns primes between $a and $b
     * @param   integer $a
     * @param   integer $b
     * @return  array
     */
    public function between(int $a, int $b)
    {
        $primes = [];
        $i = $a;
        while ($i <= $b) {
            if ($this->isPrime($i)) {
                $primes[] = $i;
            }
            $i = $this->next($i);
        }
        return $primes;
    }

    /**
     * factorizes the number
     * @param   integer $n
     * @return  array
     */
    public function factorize(int $n)
    {
        if (!$this->isNatural($n)) {
            return;
        }
        $i = 0;
        $factors = [ 0 => [null, $n], ];
        if (1 === $n || $this->isPrime($n)) {
            return $factors;
        }
        $r = $n;
        while (!$this->isPrime($r)) {
            $p = 1;
            while (1) {
                $p = $this->next($p);
                if ($r % $p === 0) {
                    $r = (int) $r / $p;
                    $factors[$i][0] = $p;
                    $factors[$i + 1][0] = null;
                    $factors[$i + 1][1] = $r;
                    break;
                }
            }
            $i++;
        }
        return $factors;
    }

    /**
     * returns the factors of the number
     * @param   integer $n
     * @return  array
     */
    public function factors(int $n)
    {
        if (!$this->isNatural($n)) {
            return;
        }
        $factors = [];
        foreach ($this->factorize($n) as $f) {
            if (is_null($f[0])) {
                $factors[] = $f[1];
            } else {
                $factors[] = $f[0];
            }
        }
        return $factors;
    }

    /**
     * counts the same elements in array
     * @param   array   $array
     * @return  array
     */
    public function countSameElements(array $array)
    {
        $r = [];
        foreach ($array as $a) {
            if (!$this->isPrime($a)) {
                return;
            }
            $r[$a] = isset($r[$a]) ? $r[$a] + 1 : 1;
        }
        return $r;
    }

    /**
     * returns the factorized formula of the number
     * @param   integer $n
     * @return  array
     */
    public function factorizedFormula(int $n)
    {
        if (!$this->isNatural($n)) {
            return;
        }
        $r = [];
        $t = [];
        $f = $this->countSameElements($this->factors($n));
        if (is_null($f)) {
            return;
        }
        foreach (array_keys($f) as $base) {
            $r[] = ['base' => $base, 'exp' => $f[$base], ];
            $t[] = $base . ($f[$base] > 1 ? ' ^ ' . $f[$base] : '');
        }
        return [
            'factors' => $r,
            'formula' => implode(' * ', $t),
        ];
    }
}
