<?php

/**
 * Examples of operation with
 * Macocci7\PhpMathInteger\Euclid
 */

require_once('../src/loader.php');

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
var_dump($d->countSameElements($d->factors($a)));
