# PHP-Math-Integer

Math library of Integer:

PHP-Math-Integer treats the subjects of number theory (only natural number).

## Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Functions](#functions)
- [Examples](#examples)
- [LICENSE](#license)

## Requirements

- PHP 8.0.0 (CLI) or later
- [Composer](https://getcomposer.org/)

## Installation

```bash
composer require macocci7/php-math-integer
```

## Usage

See [Examples](#examples).

## Functions

- Number: treats basic matters of numbers
  - isInt(): judges if the param is integer or not
  - isIntAll(): judges if all of the param are integer or not
  - isNatural(): judges if the param is natural number or not
  - isNaturalAll(): judges if all of the param are natural number or not
  - isFloat(): judges if the param is float or not
  - isFloatAll(): judges if all of the param are float or not
  - isNumber(): judges if the param is number or not (different from is_numeric())
  - isNumberAll(): judges if all of the param are number or not
  - isFraction(): judges if the param is decimal fraction or not
  - isFractionAll(): judges if all of the param are fraction or not
  - sign(): returns the sign of the param as one of -1, 0 or 1
  - int(): returns the integral part of the param
  - fraction(): returns the fractional part of the param
  - nthDigit(): returns the nth digit of the param
  - numberOfDigits(): returns the number of digits of the param
  - numberOfFractionalDigits(): returns the number of fractional digits of the param

- Prime: treats matters of primes
  - isPrime(): judges if the param is prime or not
  - isPrimeAll(): judges if all of the param are prime or not
  - next(): returns a prime next to the param
  - between(): returns array of primes between the params
  - factorize(): factorize the param and returns the process as an array
  - factors(): returns the factorized factors of the param as an array
  - factorizedFormula(): returns the factorized formula as an array

- Divisor: treats matters of divisors
  - count(): returns the number of divisors of the param
  - value(): converts the factorized array into an integer and returns it
  - formula(): returns the factorized formula as strings
  - list(): returns all of divisors of the param as an array
  - commonFactors(): returns common factors of the params as an array
  - greatestCommonFactor(): returns the greatest common factor of the params
  - commonDivisors(): returns all of common divisors of the param as an array
  - reduceFraction(): returns reduced fraction consisting of the params as an array

- Multiple: treats matters of multiples
  - leastCommonMultiple(): returns the least common multiple of the params

- Euclid (Euclidean Algorithm): treats matters of Euclidean Algorithm
  - run(): runs the Euclidean Algorithm and returns the result as an array
  - gcd(): returns the greatest common divisor of the params
  - isGcdOf(): judges if the first param is gcd of the other params or not
  - isCoprime(): judges if the params are coprime or not

- Fraction: treats matters of Fractions
  - set(): sets the properties of the fraction specified by the param
  - isReduced(): judges if the fraction is reduced or not
  - isProper(): judges if the fraction is a proper fraction or not
  - isImproper(): judges if the fraction is a improper fraction or not
  - isMixed(): judges if the fraction is a mixed fraction or not
  - reduce(): reduces the fraction
  - toCommonDenominator(): converts the fractions into a common denominator
  - add(): adds the param to the fraction
  - substruct(): substructs the param from the fraction
  - multiply(): multiplies the fraction by the param
  - divide(): divide the fraction by the param
  - improper(): converts the fraction into a improper fraction
  - mixed(): converts the fraction into a mixed fraction
  - int(): returns the value of the fraction as an integer
  - float(): returns the value of the fraction as an float
  - text(): returns the fraction as one-line-text

- Bezout (Bezout's Equation): treats matters of Bezout's Equations
  - set(): sets the properties of a Bezout's Equation from the param
  - clear(): clears the properties of the Bezout's Equation
  - equation(): returns the Bezout's Equation as one-line-text
  - isSolvable(): judges if the Bezout's Equation is solvable or not
  - solution(): returns a set of solution as an array
  - generalSolution(): returns the general solution as an array

## Examples

- [UseNumber.php](example/UseNumber.php) results in >> [UseNumber.txt](example/UseNumber.txt)
- [UsePrime.php](example/UsePrime.php) results in >> [UsePrime.txt](example/UsePrime.txt)
- [UseDivisor.php](example/UseDivisor.php) results in >> [UseDivisor.txt](example/UseDivisor.txt)
- [UseMultiple.php](example/UseMultiple.php) results in >> [UseMultiple.txt](example/UseMultiple.txt)
- [UseFraction.php](example/UseFraction.php) results in >> [UseFraction.txt](example/UseFraction.txt)
- [UseEuclid.php](example/UseEuclid.php) results in >> [UseEuclid.txt](example/UseEuclid.txt)
- [UseBezout.php](example/UseBezout.php) results in >> [UseBezout.txt](example/UseBezout.txt)

## LICENSE

[MIT](LICENSE)

***

*Document Created: 2023/10/19*

*Document Updated: 2023/11/07*

Copyright 2023 macocci7
