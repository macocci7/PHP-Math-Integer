<?php

namespace Macocci7\PhpMathInteger;

use Macocci7\PhpMathInteger\Prime;

/**
 * class for treating matters of Euclidean Algorithm
 * @author  macocci7 <macocci7@yahoo.co.jp>
 * @license MIT
 */
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
     * @param   int     $n1
     * @param   int     $n2
     * @return  null|array{
     *  gcd: int,
     *  processText: string[],
     *  processData: list<array<string, int>>,
     * }
     */
    public function run(int $n1, int $n2)
    {
        if (!$this->isNaturalAll([$n1, $n2])) {
            return null;
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
     * @param   int     $a
     * @param   int     $b
     * @return  int|null
     */
    public function gcd(int $a, int $b)
    {
        if (!$this->isNaturalAll([$a, $b])) {
            return null;
        }
        $r = $this->run($a, $b);
        return $r['gcd'];
    }

    /**
     * judges if the number $c is gcd of $a and $b or not
     * @param   int     $c
     * @param   int     $a
     * @param   int     $b
     * @return  bool
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
     * @param   int     $a
     * @param   int     $b
     * @return  bool
     */
    public function isCoprime(int $a, int $b)
    {
        return $a === $b ? false : $this->gcd($a, $b) === 1;
    }
}
