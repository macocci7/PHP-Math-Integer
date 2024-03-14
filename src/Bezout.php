<?php

namespace Macocci7\PhpMathInteger;

use Macocci7\PhpMathInteger\Euclid;

/**
 * class for treating matters of Bezout's identity
 * @author  macocci7 <macocci7@yahoo.co.jp>
 * @license MIT
 */
class Bezout extends Euclid
{
    /**
     * coefficients of a Bezout's Identity
     * $a * x + $b * y = $c
     */
    public int $a;
    public int $b;
    public int $c;

    /**
     * constructor
     */
    public function __construct(array $c = [])
    {
        $this->set($c);
    }

    /**
     * sets coefficients of a Bezout's Identity
     * @param   int[]   $c
     * @return  self
     * @thrown  \Exception
     */
    public function set(array $c = [])
    {
        if (count($c) !== 3) {
            throw new \Exception("Too few array elements. 3 expected.");
        }
        foreach ($c as $v) {
            if (!$this->isInt($v)) {
                throw new \Exception("Invalid array element specified. Int expected.");
            }
        }
        if ($c[0] === 0 || $c[1] === 0) {
            throw new \Exception("Zero specified.");
        }
        $this->a = $c[0];
        $this->b = $c[1];
        $this->c = $c[2];
        return $this;
    }

    /**
     * clears coefficients of Bezout's Identity
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
     * returns Bezout's identity
     * @return  string|null
     */
    public function identity()
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
     * judges if the Bezout's identity is solvable or not
     * @return  bool
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
     * returns a solution set of the Bezout's Identity
     * @return  null|array{
     *  processData: list<array{
     *      s: int,
     *      t: int,
     *  }>,
     *  solution: array{
     *      x: int,
     *      y: int,
     *  },
     * }
     */
    public function solution()
    {
        if (!$this->isSolvable()) {
            return null;
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
     * @return  null|array{
     *  solutionSet: array{
     *      processData: list<array{
     *          s: int,
     *          t: int,
     *      }>,
     *      solution: array{
     *          x: int,
     *          y: int,
     *      },
     *  },
     *  generalSolution: array{
     *      x: array{
     *          a: int,
     *          b: int,
     *      },
     *      y: array{
     *          a: int,
     *          b: int,
     *      },
     *      formula: array{
     *          x: string,
     *          y: string,
     *      },
     *  },
     * }
     */
    public function generalSolution()
    {
        if (!$this->isSolvable()) {
            return null;
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
