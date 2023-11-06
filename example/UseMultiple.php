<?php

require_once('../src/loader.php');

use Macocci7\PhpMathInteger\Multiple;

$m = new Multiple();
$a = 12;
$b = 18;

// least common multiple
echo sprintf(
    "least common multiple of %d and %d is %d\n",
    $a,
    $b,
    $m->leastCommonMultiple($a, $b)
);
