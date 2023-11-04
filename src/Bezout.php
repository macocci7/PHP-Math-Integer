<?php

namespace Macocci7\PhpMathInteger;

use Macocci7\PhpMathInteger\Euclid;

class Bezout extends Euclid
{
    /**
     * coefficients of a Bezout Equation
     * $a * x + $b * y = $c
     */
    public $a;
    public $b;
    public $c;

    /**
     * constructor
     */
    public function __construct()
    {
    }

    /**
     * judges if the Bezout equation is solvable or not
     * @param
     * @return  boolean
     */
    public function isSolvable()
    {
        return $this->isIntAll([ $this->a, $this->b, $this->c, ])
            && (
                $this->isCoprime(abs($this->a), abs($this->b))
                || (
                    !($this->a === $this->b && $this->a === $this->c)
                    && $this->isGcdOf(
                        abs($this->c),
                        abs($this->a),
                        abs($this->b)
                    )
                )
            );
    }

    /**
     * returns a solution set of the Bezout equation
     * @param
     * @return  array|null
     */
    public function solution()
    {
        if (!$this->isSolvable()) {
            return;
        }
        $e = $this->run(abs($this->a), abs($this->b));
        $pr = $e['processData'];
        $idx = array_keys($pr);
        $r = [ 'processData' => [], ];
        $s = 0;
        $t = 1;
        $na1 = abs($this->a);
        $na2 = abs($this->b);
        for ($i = count($idx) - 2; $i >= 0; $i--) {
            $c = $pr[$i]['c'];
            $tmp = $s;
            $s = $t;
            $t = $tmp - $c * $t;
            $r['processData'][] = [ 's' => $s, 't' => $t, ];
            $r['solution'] = [
                'x' => $na1 >= $na2
                       ? $s * $this->getSign($this->a) * $this->c
                       : $t * $this->getSign($this->a) * $this->c,
                'y' => $na1 >= $na2
                       ? $t * $this->getSign($this->b) * $this->c
                       : $s * $this->getSign($this->b) * $this->c,
            ];
        }
        return $r;
    }

    /**
     * returns general solution of the Bezout equation
     * @param
     * @return  array|null
     */
    public function generalSolution()
    {
        if (!$this->isSolvable()) {
            return;
        }
        $r = [];
        $r['solutionSet'] = $this->solution();
        $x = $r['solutionSet']['solution']['x'];
        $y = $r['solutionSet']['solution']['y'];
        $r['generalSolution'] = [
            'x' => [ 'a' => $this->b, 'b' => $x, ],
            'y' => [ 'a' => $this->a, 'b' => $y, ],
            'formula' => [
                'x' => 'x = ' . $this->b . 'k'
                        . ($x < 0 ? ' - ' : ' + ') . abs($x),
                'y' => 'y = ' . $this->a . 'k'
                        . ($y < 0 ? ' - ' : ' + ') . abs($y),
            ],
        ];
        return $r;
    }
}
