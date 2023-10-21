<?php

namespace Macocci7\PhpMathInteger;

use Macocci7\PhpMathInteger\Prime;

class Divisor extends Prime
{
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
}
