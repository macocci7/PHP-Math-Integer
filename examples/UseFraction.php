<?php

require_once('../vendor/autoload.php');

use Macocci7\PhpMathInteger\Fraction;

// prest: 1 and 2/4
$f = new Fraction('1 2/4');

// is reduced or not?
echo $f->text() . " is " . ($f->isReduced() ? '' : 'not ') . "reduced.\n";

// is proper or not?
echo $f->text() . " is " . ($f->isProper() ? '' : 'not ') . "a proper fraction.\n";

// is improper or not?
echo $f->text() . " is " . ($f->isImproper() ? '' : 'not ') . "a improper fraction.\n";

// is mixed or not?
echo $f->text() . " is " . ($f->isMixed() ? '' : 'not ') . "a mixed fraction.\n";

// convert $f into a improper fraction
echo $f->text() . " = " . $f->improper()->text() . "\n";

// convert $f into a mixed fraction
echo $f->text() . " = " . $f->mixed()->text() . "\n";

// reduce fraction
echo $f->text() . " reduces to " . $f->reduce()->text() . "\n";

// integral part
echo "integral part of " . $f->text() . " is " . $f->int() . "\n";

// change into a float
echo $f->text() . " = " . $f->float() . "\n";

// four arithmetic operations
$f1 = new Fraction('1/3');
$f2 = new Fraction('1/6');
echo $f1->text() . ' + ' . $f2->text() . ' = ' . $f1->add($f2)->text() . "\n";
$f1->set('2/3');
$f2->set('1/6');
echo $f1->text() . ' - ' . $f2->text() . ' = ' . $f1->substract($f2)->text() . "\n";
$f1->set('2/3');
$f2->set('1/6');
echo $f1->text() . ' * ' . $f2->text() . ' = ' . $f1->multiply($f2)->text() . "\n";
$f1->set('2/3');
$f2->set('1/6');
echo $f1->text() . ' / ' . $f2->text() . ' = ' . $f1->divide($f2)->text() . "\n";

// reduce fractions to a common denominator
$f1->set('1/3');
$f2->set('2/5');
echo "reduce the fractions of " . $f1->text() . " and " . $f2->text()
    . " to a common denominator:\n";
$f1->toCommonDenominator($f2);
echo $f1->text() . " and " . $f2->text() . "\n";
