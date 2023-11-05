<?php

/**
 * Examples of operation with
 * Macocci7\PhpMathInteger\Number
 */

require_once('../src/loader.php');

use Macocci7\PhpMathInteger\Number;

$n = new Number();

var_dump(
    $n->isInt(1),
    $n->isIntAll([ 1, 2, 3, ]),
    $n->isNatural(1),
    $n->isNaturalAll([ 1, 2, 3, ]),
    $n->isFloat(1.2),
    $n->isFloatAll([ -2.1, 0.0, 1.2, ]),
    $n->isNumber(1.2),
    $n->isNumberAll([ -2, 0.1, 3, ]),
    $n->isFraction(0.1),
    $n->isFractionAll([ -0.99, 0.1, 0.99]),
    $n->sign(-2.5),
    $n->int(3.14),
    $n->fraction(3.14),
    $n->nthDigit(-3, 123.456),
    $n->numberOfDigits(-123.4567),
    $n->numberOfFractionalDigits(-12.3456),
);
