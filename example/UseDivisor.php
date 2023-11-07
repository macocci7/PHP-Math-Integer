<?php

/**
 * Examples of operation with
 * Macocci7\PhpMathInteger\Euclid
 */

 require_once('../vendor/autoload.php');

use Macocci7\PhpMathInteger\Divisor;

$d = new Divisor();
$a = 12;
$b = 18;

// Number of divisors
echo sprintf("%d has %d divisors.\n", $a, $d->count($a));

// List of all divisors
echo sprintf("[%s]\n", implode(', ', $d->list($a)));

// Common factors
echo sprintf("%d = %s\n", $a, $d->formula($a));
echo sprintf("%d = %s\n", $b, $d->formula($b));
echo sprintf(
    "common factors : %s\n",
    $d->formula($d->value($d->commonFactors($a, $b)))
);
echo sprintf(
    "common divisors : [%s]\n",
    implode(', ', $d->commonDivisors($a, $b))
);

// greatest common factor (divisor)
echo sprintf(
    "greatest common factor (divisor) : %s\n",
    $d->greatestCommonFactor($a, $b)
);

// Reducing fraction
$r = $d->reduceFraction($a, $b);
$ra = $d->value($r[0]);
$rb = $d->value($r[1]);
echo sprintf("%d/%d reduces to %d/%d\n", $a, $b, $ra, $rb);
