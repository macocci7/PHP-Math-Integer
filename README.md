# PHP-Math-Integer

## 1. Features

`PHP-Math-Integer` is a PHP library which treats the subjects of number theory (only natural number).

Available Subjects:

- basic matters of Numbers
- basic matters of Primes
- basic matters of Divisors
- basic matters of Multiples
- basic matters of Euclidean Algorithm
- basic matters of Common Fractions
- basic matters of Bezout's Identities

## 2. Contents

- [1. Features](#1-features)
- 2\. Contents
- [3. Requirements](#3-requirements)
- [4. Installation](#4-installation)
- [5. Usage](#5-usage)
  - [5.1. Macocci7\PhpMathInteger\Number](#51-macocci7phpmathintegernumber)
  - [5.2. Macocci7\PhpMathInteger\Prime](#52-macocci7phpmathintegerprime)
  - [5.3. Macocci7\PhpMathInteger\Divisor](#53-macocci7phpmathintegerdivisor)
  - [5.4. Macocci7\PhpMathInteger\Multiple](#54-macocci7phpmathintegermultiple)
  - [5.5. Macocci7\PhpMathInteger\Euclid](#55-macocci7phpmathintegereuclid)
  - [5.6. Macocci7\PhpMathInteger\Fraction](#56-macocci7phpmathintegerfraction)
  - [5.7. Macocci7\PhpMathInteger\Bezout](#57-macocci7phpmathintegerbezout)
- [6. Examples](#6-examples)
- [7. LICENSE](#7-license)

## 3. Requirements

- PHP 8.1 or later
- [Composer](https://getcomposer.org/)

## 4. Installation

```bash
composer require macocci7/php-math-integer
```

## 5. Usage

- [5.1. Macocci7\PhpMathInteger\Number](#51-macocci7phpmathintegernumber)
- [5.2. Macocci7\PhpMathInteger\Prime](#52-macocci7phpmathintegerprime)
- [5.3. Macocci7\PhpMathInteger\Divisor](#53-macocci7phpmathintegerdivisor)
- [5.4. Macocci7\PhpMathInteger\Multiple](#54-macocci7phpmathintegermultiple)
- [5.5. Macocci7\PhpMathInteger\Euclid](#55-macocci7phpmathintegereuclid)
- [5.6. Macocci7\PhpMathInteger\Fraction](#56-macocci7phpmathintegerfraction)
- [5.7. Macocci7\PhpMathInteger\Bezout](#57-macocci7phpmathintegerbezout)

### 5.1. Macocci7\PhpMathInteger\Number

This class treats basic matters of numbers.

- PHP:

  ```php
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
  ```

- Result:

  ```
  Is 1 int? - Yes.
  Are [ 1, 2, 3, ] all int? - Yes.
  Is 1 natural? - Yes.
  Are [ 1, 2, 3, ] all natural? - Yes.
  Is 1.2 float? - Yes.
  Are [ -2.1, 0.0, 1.2, ] all float? - Yes.
  Is 1.2 number? - Yes.
  Are [ -2, 0.1, 3, ] all number? - Yes.
  Is 0.1 fraction? - Yes.
  Are [ -0.99, 0.1, 0.99, ] all fraction? - Yes.
  Sign of -2.5 is -1.
  Integer part of 3.14 is 3.
  Fractional part of 3.14 is 0.14.
  -3th digit of 123.4567 is 6.
  Number of digits -123.4567 is 3.
  Number of fractional digits -12.3456 is 4.
  ```

- Methods:

  |Method|Detail|
  |:---|:---|
  |`isInt(mixed $n)`|judges if the param is integer or not|
  |`isIntAll(array $ns)`|judges if all of the param are integer or not|
  |`isNatural(mixed $n)`|judges if the param is natural number or not|
  |`isNaturalAll(array $ns)`|judges if all of the param are natural number or not|
  |`isFloat(mixed $n)`|judges if the param is float or not|
  |`isFloatAll(array $ns)`|judges if all of the param are float or not|
  |`isNumber(mixed $n)`|judges if the param is number or not (different from is_numeric())|
  |`isNumberAll(array $ns)`|judges if all of the param are number or not|
  |`isFraction(mixed $n)`|judges if the param is decimal fraction or not|
  |`isFractionAll(array $ns)`|judges if all of the param are fraction or not|
  |`sign(int\|float\|null $n)`|returns the sign of the param as one of -1, 0 or 1|
  |`int(float $n)`|returns the integral part of the param|
  |`fraction(float $n)`|returns the fractional part of the param|
  |`nthDigit(int $n, int\|float $d)`|returns the nth digit of the param|
  |`numberOfDigits(int\|float $n)`|returns the number of digits of the param|
  |`numberOfFractionalDigits(float $n)`|returns the number of fractional digits of the param|

### 5.2. Macocci7\PhpMathInteger\Prime

This class treats basic matters of primes.

- PHP:

  ```php
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
  ```

- Result:

  ```
  Is 3 prime? - Yes.
  Are all of [2, 3, 5] prime? - Yes.
  A prime next to 5 is 7.
  Primes between 6 and 14 are [7, 11, 13].
  Factorize 1234567890:
    2)1234567890
      ----------
    3) 617283945
      ----------
    3) 205761315
      ----------
    5)  68587105
      ----------
  3607)  13717421
      ----------
            3803
  1234567890 = 2 * 3 ^ 2 * 5 * 3607 * 3803
  ```

- Methods:

  |Method|Detail|
  |:---|:---|
  |`isPrime(int $n)`|judges if the param is prime or not|
  |`isPrimeAll(array $elements)`|judges if all of the param are prime or not|
  |`next(int $n)`|returns a prime next to the param|
  |`between(int $a, int $b)`|returns array of primes between the params|
  |`factorize(int $n)`|factorize the param and returns the process as an array|
  |`factors(int $n)`|returns the factorized factors of the param as an array|
  |`factorizedFormula(int $n)`|returns the factorized formula as an array|

### 5.3. Macocci7\PhpMathInteger\Divisor

This class treats basic matters of divisors.

- PHP:

  ```php
  <?php

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
  ```

- Result:

  ```
  12 has 6 divisors.
  [1, 2, 3, 4, 6, 12]
  12 = 2 ^ 2 * 3
  18 = 2 * 3 ^ 2
  common factors : 2 * 3
  common divisors : [1, 2, 3, 6]
  greatest common factor (divisor) : 6
  12/18 reduces to 2/3
  ```

- Methods:

  |Method|Detail|
  |:---|:---|
  |`count(int $n)`|returns the number of divisors of the param|
  |`value(array $factors)`|converts the factorized array into an integer and returns it|
  |`formula(int $n)`|returns the factorized formula as strings|
  |`list(int $n)`|returns all of divisors of the param as an array|
  |`commonFactors(int $n1, int $n2)`|returns common factors of the params as an array|
  |`greatestCommonFactor(int $n1, int $n2)`|returns the greatest common factor of the params|
  |`commonDivisors(int $n1, int $n2)`|returns all of common divisors of the param as an array|
  |`reduceFraction(int $n1, int $n2)`|returns reduced fraction consisting of the params as an array|

### 5.4. Macocci7\PhpMathInteger\Multiple

This class treats basic matters of multiples.

- PHP:

  ```php
  <?php

  require_once('../vendor/autoload.php');

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
  ```

- Result:

  ```
  least common multiple of 12 and 18 is 36
  ```

- Methods:

  |Method|Detail|
  |:---|:---|
  |`leastCommonMultiple(int $n1, int $n2)`|returns the least common multiple of the params|

### 5.5. Macocci7\PhpMathInteger\Euclid

This class treats basic matters of Euclidean Algorithm.

- PHP:

  ```php
  <?php

  require_once('../vendor/autoload.php');

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
  ```

- Result:

  ```
  Is 39 GCD(390, 273)? - Yes.
  Euclidean Algorithm:
  390 = 273 * 1 + 117
  273 = 117 * 2 + 39
  117 = 39 * 3 + 0
  Remainders can be expressed as:
  117 = 390 - 273 * 1
  39 = 273 - 117 * 2
  0 = 117 - 39 * 3
  Are 390 and 273 coprime? - No.
  Because the Greatest Common Divisor of 390 and 273 is 39.
  ```

- Methods:

  |Method|Detail|
  |:---|:---|
  |`run(int $n1, int $n2)`|runs the Euclidean Algorithm and returns the result as an array|
  |`gcd(int $a, int $b)`|returns the greatest common divisor of the params|
  |`isGcdOf(int $c, int $a, int $b)`|judges if the first param is gcd of the other params or not|
  |`isCoprime(int $a, int $b)`|judges if the params are coprime or not|

### 5.6. Macocci7\PhpMathInteger\Fraction

This class treats basic matters of common fractions.

- PHP:

  ```php
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
  ```

- Result:

  ```
  1 2/4 is not reduced.
  1 2/4 is not a proper fraction.
  1 2/4 is not a improper fraction.
  1 2/4 is a mixed fraction.
  1 2/4 = 6/4
  6/4 = 1 2/4
  1 2/4 reduces to 1 1/2
  integral part of 1 1/2 is 1
  1 1/2 = 1.5
  1/3 + 1/6 = 1/2
  2/3 - 1/6 = 1/2
  2/3 * 1/6 = 1/9
  2/3 / 1/6 = 4/1
  reduce the fractions of 1/3 and 2/5 to a common denominator:
  5/15 and 6/15
  ```

- Methods:

  |Method|Detail|
  |:---|:---|
  |`set(string $s)`|sets the properties of the fraction specified by the param|
  |`isReduced()`|judges if the fraction is reduced or not|
  |`isProper()`|judges if the fraction is a proper fraction or not|
  |`isImproper()`|judges if the fraction is a improper fraction or not|
  |`isMixed()`|judges if the fraction is a mixed fraction or not|
  |`reduce()`|reduces the fraction|
  |`toCommonDenominator(Fraction &$f)`|converts the fractions into a common denominator|
  |`add(Fraction $f)`|adds the param to the fraction|
  |`substract(Fraction $f)`|substracts the param from the fraction|
  |`multiply(Fraction $f)`|multiplies the fraction by the param|
  |`divide(Fraction $f)`|divide the fraction by the param|
  |`improper()`|converts the fraction into a improper fraction|
  |`mixed()`|converts the fraction into a mixed fraction|
  |`int()`|returns the value of the fraction as an integer|
  |`float()`|returns the value of the fraction as an float|
  |`text()`|returns the fraction as one-line-text|

### 5.7. Macocci7\PhpMathInteger\Bezout

This class treats basic matters of Bezout's Identity.

- PHP:

  ```php
  <?php

  require_once('../vendor/autoload.php');

  use Macocci7\PhpMathInteger\Bezout;

  // Bezout's Identity: 3x + 4y = 1
  $b = new Bezout([3, 4, 1, ]);
  echo sprintf("Bezout's Identity: %s\n", $b->identity());

  // Solvable or not
  echo sprintf("Is it solvable? - %s.\n", ($b->isSolvable() ? 'Yes' : 'No'));

  // A solution set
  $s = $b->solution()['solution'];
  echo sprintf("A solutionset: (x, y) = (%d, %d)\n", $s['x'], $s['y']);

  // General solution
  $g = $b->generalSolution()['generalSolution']['formula'];
  echo sprintf("General solution:\n\t%s\n\t%s\n", $g['x'], $g['y']);
  ```

- Result:

  ```
  Bezout's Identity: 3x + 4y = 1
  Is it solvable? - Yes.
  A solutionset: (x, y) = (-1, 1)
  General solution:
    x = 4k - 1
    y = 3k + 1
  ```

- Methods:

  |Method|Detail|
  |:---|:---|
  |`set(array $c = [])`|sets the properties of a Bezout's Equation from the param|
  |`clear()`|clears the properties of the Bezout's Equation|
  |`equation()`|returns the Bezout's Equation as one-line-text|
  |`isSolvable()`|judges if the Bezout's Equation is solvable or not|
  |`solution()`|returns a set of solution as an array|
  |`generalSolution()`|returns the general solution as an array|

## 6. Examples

- [UseNumber.php](examples/UseNumber.php) results in >> [UseNumber.txt](examples/UseNumber.txt)
- [UsePrime.php](examples/UsePrime.php) results in >> [UsePrime.txt](examples/UsePrime.txt)
- [UseDivisor.php](examples/UseDivisor.php) results in >> [UseDivisor.txt](examples/UseDivisor.txt)
- [UseMultiple.php](examples/UseMultiple.php) results in >> [UseMultiple.txt](examples/UseMultiple.txt)
- [UseFraction.php](examples/UseFraction.php) results in >> [UseFraction.txt](examples/UseFraction.txt)
- [UseEuclid.php](examples/UseEuclid.php) results in >> [UseEuclid.txt](examples/UseEuclid.txt)
- [UseBezout.php](examples/UseBezout.php) results in >> [UseBezout.txt](examples/UseBezout.txt)

## 7. LICENSE

[MIT](LICENSE)

***

*Document Created: 2023/10/19*

*Document Updated: 2024/03/16*

Copyright 2023 - 2024 macocci7
