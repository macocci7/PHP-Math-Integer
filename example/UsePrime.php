<?php

/**
 * Examples of operation with
 * Macocci7\PhpMathInteger\Prime
 */

require_once('../src/loader.php');

use Macocci7\PhpMathInteger\Prime;

$p = new Prime();

var_dump(
    $p->isPrime(3),
    $p->isPrimeAll([ 2, 3, 5, ]),
    $p->next(5),
    $p->between(6, 14),
    $p->factors(12), // = 2 * 2 * 3
    $p->countSameElements($p->factors(72)), // = (2 ** 3) * (3 ** 2)
);

// factorize
$n = 1234567890;
$r = $p->factorize($n);
$l1 = $p->numberOfDigits(max(array_column($r, 0)));
$l2 = $p->numberOfDigits(max(array_column($r, 1)));
$s = str_repeat(' ', $l1 + 1);
$b = $s . str_repeat('-', $l2);
foreach ($r as $f) {
    echo (
        $f[0]
        ? sprintf("%" . $l1 . "d)%" . $l2 . "d\n%s\n", $f[0], $f[1], $b)
        : sprintf("%s%" . $l2 . "d\n", $s, $f[1])
    );
}

echo $n . " = " . $p->factorizedFormula($n)['formula'] . "\n";
