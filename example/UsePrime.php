<?php

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
    $p->factorizedFormula(72),
);

// factorize
$r = $p->factorize(1234567890);
$s = str_repeat(' ', strlen((string) max(array_column($r, 0))) + 1);
$b = $s . str_repeat('-', strlen(max(array_column($r, 1))));
foreach ($r as $f) {
    echo ($f[0] ? $f[0] . ")" . $f[1] . "\n" . $b . "\n" : $s . $f[1] . "\n");
}
