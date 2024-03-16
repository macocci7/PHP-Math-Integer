<?php

require_once('../vendor/autoload.php');

use Macocci7\PhpMathInteger\Number;

$n = new Number();

echo "Is 1 int? - " . ($n->isInt(1) ? 'Yes' : 'No') . ".\n";
echo "Are [ 1, 2, 3, ] all int? - " . ($n->isIntAll([ 1, 2, 3, ]) ? 'Yes' : 'No') . ".\n";
echo "Is 1 natural? - " . ($n->isNatural(1) ? 'Yes' : 'No') . ".\n";
echo "Are [ 1, 2, 3, ] all natural? - " . ($n->isNaturalAll([ 1, 2, 3, ]) ? 'Yes' : 'No') . ".\n";
echo "Is 1.2 float? - " . ($n->isFloat(1.2) ? 'Yes' : 'No') . ".\n";
echo "Are [ -2.1, 0.0, 1.2, ] all float? - " . ($n->isFloatAll([ -2.1, 0.0, 1.2, ]) ? 'Yes' : 'No') . ".\n";
echo "Is 1.2 number? - " . ($n->isNumber(1.2) ? 'Yes' : 'No') . ".\n";
echo "Are [ -2, 0.1, 3, ] all number? - " . ($n->isNumberAll([ -2, 0.1, 3, ]) ? 'Yes' : 'No') . ".\n";
echo "Is 0.1 fraction? - " . ($n->isFraction(0.1) ? 'Yes' : 'No') . ".\n";
echo "Are [ -0.99, 0.1, 0.99, ] all fraction? - " . ($n->isFractionAll([ -0.99, 0.1, 0.99, ]) ? 'Yes' : 'No') . ".\n";
echo "Sign of -2.5 is " . $n->sign(-2.5) . ".\n";
echo "Integer part of 3.14 is " . $n->int(3.14) . ".\n";
echo "Fractional part of 3.14 is " . $n->fraction(3.14) . ".\n";
echo "-3th digit of 123.4567 is " . $n->nthDigit(-3, 123.4567) . ".\n";
echo "Number of digits -123.4567 is " . $n->numberOfDigits(-123.4567) . ".\n";
echo "Number of fractional digits -12.3456 is " . $n->numberOfFractionalDigits(-12.3456) . ".\n";
