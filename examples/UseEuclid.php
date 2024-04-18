<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Macocci7\PhpMathInteger\Euclid;

// Presets values
$e = new Euclid();
$a = 390;
$b = 273;
$c = 39;

// Judges if $c is GCD($a, $b) or not
echo sprintf(
    "Is %d GCD(%d, %d)? - %s.\n",
    $c,
    $a,
    $b,
    $e->isGcdOf($c, $a, $b) ? 'Yes' : 'No'
);

// Euclidean Algorithm
$r = $e->run($a, $b);
echo "Euclidean Algorithm:\n";
foreach ($r['processText'] as $t) {
    echo $t . "\n";
}

// Formula of remainders
echo "Remainders can be expressed as:\n";
foreach ($r['processData'] as $d) {
    echo sprintf("%d = %d - %d * %d\n", $d['r'], $d['a'], $d['b'], $d['c']);
}

// Judges if $a and $b are coprime or not
echo sprintf(
    "Are %d and %d coprime? - %s.\n",
    $a,
    $b,
    $e->isCoprime($a, $b) ? 'Yes' : 'No'
);

// GCD($a, $b)
echo sprintf(
    "Because the Greatest Common Divisor of %d and %d is %d.\n",
    $a,
    $b,
    $e->gcd($a, $b)
);
