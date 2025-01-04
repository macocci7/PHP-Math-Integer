<?php

namespace Macocci7\PhpMathInteger;

use Macocci7\PhpMathInteger\Number;

/**
 * class for treating matters of primes
 * @author  macocci7 <macocci7@yahoo.co.jp>
 * @license MIT
 */
class Prime extends Number
{
    /**
     * constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * judges if the number is prime or not
     * @param   int     $n
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
     * @param   mixed[]     $elements
     * @return  bool
     */
    public function isPrimeAll(array $elements)
    {
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
     * returns the previous prime
     * @param   int     $n
     * @return  int|null
     */
    public function previous(int $n)
    {
        if ($n <= 2) {
            return null;
        }
        $i = $n - 1;
        while (!$this->isPrime($i)) {
            --$i;
        }
        return $i;
    }

    /**
     * returns the next prime
     * @param   int     $n
     * @return  int
     */
    public function next(int $n)
    {
        $i = $n > 1 ? $n + 1 : 2;
        while (!$this->isPrime($i)) {
            ++$i;
        }
        return $i;
    }

    /**
     * returns primes between $a and $b
     * @param   int     $a
     * @param   int     $b
     * @return  int[]
     * @thrwon  \Exception
     */
    public function between(int $a, int $b)
    {
        if ($a < 2 || $b < 2) {
            throw new \Exception("Specify numbers greater than 1.");
        }
        $primes = [];
        $i = $a < $b ? $a : $b;
        $u = $a < $b ? $b : $a;
        while ($i <= $u) {
            if ($this->isPrime($i)) {
                $primes[] = $i;
            }
            $i = $this->next($i);
        }
        return $primes;
    }

    /**
     * factorizes the number
     * @param   int     $n
     * @return  list<array<int, int|null>>|null
     */
    public function factorize(int $n)
    {
        if (!$this->isNatural($n)) {
            return null;
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
            ++$i;
        }
        return $factors;
    }

    /**
     * returns the factors of the number
     * @param   int     $n
     * @return  int[]|null
     */
    public function factors(int $n)
    {
        if (!$this->isNatural($n)) {
            return null;
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
     * @param   mixed[]     $array
     * @return  int[]|null
     */
    public function countSameElements(array $array)
    {
        $r = [];
        foreach ($array as $a) {
            if (!$this->isPrime($a)) {
                return null;
            }
            $r[$a] = isset($r[$a]) ? $r[$a] + 1 : 1;
        }
        return $r;
    }

    /**
     * returns the factorized formula of the number
     * @param   int     $n
     * @return  null|array{
     *  factors: list<
     *      array{
     *          base: int,
     *          exp: int,
     *      }
     *  >,
     *  formula: string,
     * }
     */
    public function factorizedFormula(int $n)
    {
        if (!$this->isNatural($n)) {
            return null;
        }
        $f = $this->countSameElements($this->factors($n));
        if (is_null($f)) {
            return null;
        }
        $r = [];
        $t = [];
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
