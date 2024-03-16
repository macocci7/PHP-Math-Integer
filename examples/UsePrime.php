<?php

 require_once('../vendor/autoload.php');

use Macocci7\PhpMathInteger\Prime;

$p = new Prime();

// judge if $n is prime or not
$n = 3;
echo sprintf("Is %d prime? - %s.\n", $n, $p->isPrime($n) ? 'Yes' : 'No');

// judge if all of $n are prime or not
$n = [ 2, 3, 5, ];
echo sprintf(
    "Are all of [%s] prime? - %s.\n",
    implode(', ', $n),
    $p->isPrimeAll($n) ? 'Yes' : 'No'
);

// a prime next to $n
$n = 5;
echo sprintf("A prime next to %d is %d.\n", $n, $p->next($n));

// primes between $a and $b
$a = 6;
$b = 14;
echo sprintf(
    "Primes between %d and %d are [%s].\n",
    $a,
    $b,
    implode(', ', $p->between($a, $b))
);

// factorize
$n = 1234567890;
echo sprintf("Factorize %d:\n", $n);
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

// Factorized formula
echo $n . " = " . $p->factorizedFormula($n)['formula'] . "\n";
