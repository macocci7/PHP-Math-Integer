<?php

namespace Macocci7\PhpMathInteger;

use Macocci7\PhpMathInteger\Divisor;

class Multiple extends Divisor
{
    /**
     * constructor
     */
    public function __construct()
    {
    }

    /**
     * returns factors of the least common multiple
     * @param   integer $n1
     * @param   integer $n2
     * @return  array|null
     */
    public function leastCommonMultipleFactors(int $n1, int $n2)
    {
        if (!$this->isNaturalAll([$n1, $n2])) {
            return;
        }
        $f1 = $this->factors($n1);
        $f2 = $this->factors($n2);
        $m1 = $this->countSameElements($f1);
        $m2 = $this->countSameElements($f2);
        foreach (isset($m2) ? array_keys($m2) : [] as $radix) {
            if (isset($m1[$radix])) {
                if ($m1[$radix] < $m2[$radix]) {
                    $m1[$radix] = $m2[$radix];
                }
            } else {
                $m1[$radix] = $m2[$radix];
            }
        }
        return empty($m1) ? [ 1 => 1, ] : $m1;
    }

    /**
     * returns the least common multiple
     * @param   integer $n1
     * @param   integer $n2
     * @return  integer|null
     */
    public function leastCommonMultiple(int $n1, int $n2)
    {
        if (!$this->isNaturalAll([$n1, $n2])) {
            return;
        }
        $cm = $this->leastCommonMultipleFactors($n1, $n2);
        return is_array($cm) ? $this->value($cm) : $cm;
    }
}
