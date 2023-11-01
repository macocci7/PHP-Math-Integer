<?php

namespace Macocci7\PhpMathInteger;

use Macocci7\PhpMathInteger\Prime;

class Euclid extends Prime
{
    /**
     * constructor
     */
    public function __construct()
    {
    }

    /**
     * runs Euclidean Algorithm and returns the result
     * @param   integer $n1
     * @param   integer $n2
     * @return  array|null
     */
    public function run(int $n1, int $n2)
    {
        if (!$this->isNaturalAll([$n1, $n2])) {
            return;
        }
        $result = [
            'gcd' => 1,
            'processText' => [],
            'processData' => [],
        ];
        $a = $n1 > $n2 ? $n1 : $n2;
        $b = $n1 > $n2 ? $n2 : $n1;
        $step = function (int $a, int $b, array &$result): int {
            $c = (int) ($a / $b);
            $r = $a % $b;
            $f = $a . ' = ' . $b . ' * ' . $c . ' + ' . $r;
            $d = [ 'a' => $a, 'b' => $b, 'c' => $c, 'r' => $r, ];
            $result['processText'][] = $f;
            $result['processData'][] = $d;
            return $r;
        };
        $r = $step($a, $b, $result);
        while ($r > 0) {
            $a = $b;
            $b = $r;
            $r = $step($a, $b, $result);
        }
        $result['gcd'] = $b;
        return $result;
    }

    /**
     * returns gcd
     * @param   integer $a
     * @param   integer $b
     * @return  integer|null;
     */
    public function gcd(int $a, int $b)
    {
        if (!$this->isNaturalAll([$a, $b])) {
            return;
        }
        $r = $this->run($a, $b);
        return $r['gcd'];
    }

    /**
     * judges if the number $c is gcd of $a and $b or not
     * @param   integer $c
     * @param   integer $a
     * @param   integer $b
     * @return  boolean
     */
    public function isGcdOf(int $c, int $a, int $b)
    {
        if (!$this->isNaturalAll([$a, $b, $c])) {
            return false;
        }
        return $this->gcd($a, $b) === $c;
    }

    /**
     * judges if $a and $b are coprime or not
     * @param   integer $a
     * @param   integer $b
     * @return  boolean
     */
    public function isCoprime(int $a, int $b)
    {
        return $a === $b ? false : $this->gcd($a, $b) === 1;
    }
}
