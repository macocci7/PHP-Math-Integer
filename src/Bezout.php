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
    public function __construct(array $c = [])
    {
        $this->set($c);
    }

    /**
     * sets coefficients of a Bezout Equation
     * @param   array   $c
     * @return  self
     */
    public function set(array $c = [])
    {
        if (count($c) !== 3) {
            $this->clear();
            return;
        }
        foreach ($c as $v) {
            if (!$this->isInt($v)) {
                $this->clear();
                return;
            }
        }
        if ($c[0] === 0 || $c[1] === 0) {
            $this->clear();
            return;
        }
        $this->a = $c[0];
        $this->b = $c[1];
        $this->c = $c[2];
        return $this;
    }

    /**
     * clears coefficients of Bezout Equation
     * @param
     * @return self
     */
    public function clear()
    {
        $this->a = null;
        $this->b = null;
        $this->c = null;
        return $this;
    }

    /**
     * returns Bezout's equation
     * @param
     * @return  string
     */
    public function equation()
    {
        return $this->isIntAll([$this->a, $this->b, $this->c, ])
            ? sprintf(
                "%sx %s %sy = %d",
                $this->a === 1 ? '' : ($this->a === -1 ? '-' : $this->a),
                $this->b > 0 ? '+' : '-',
                abs($this->b) === 1 ? '' : abs($this->b),
                $this->c
            )
            : null;
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
                       ? $s * $this->sign($this->a) * $this->c
                       : $t * $this->sign($this->a) * $this->c,
                'y' => $na1 >= $na2
                       ? $t * $this->sign($this->b) * $this->c
                       : $s * $this->sign($this->b) * $this->c,
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
