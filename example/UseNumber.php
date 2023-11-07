<?php

/**
 * Examples of operation with
 * Macocci7\PhpMathInteger\Number
 */

require_once('../src/loader.php');

use Macocci7\PhpMathInteger\Number;

$n = new Number();

var_dump(
    $n->isInt(1), // true
    $n->isIntAll([ 1, 2, 3, ]), // true
    $n->isNatural(1), // true
    $n->isNaturalAll([ 1, 2, 3, ]), // true
    $n->isFloat(1.2), // true
    $n->isFloatAll([ -2.1, 0.0, 1.2, ]), // true
    $n->isNumber(1.2), // true
    $n->isNumberAll([ -2, 0.1, 3, ]), // true
    $n->isFraction(0.1), // true
    $n->isFractionAll([ -0.99, 0.1, 0.99]), // true
    $n->sign(-2.5), // -1
    $n->int(3.14), // 3
    $n->fraction(3.14), // 0.1400...
    $n->nthDigit(-3, 123.456), // 6
    $n->numberOfDigits(-123.4567), // 3
    $n->numberOfFractionalDigits(-12.3456), // 4
);
