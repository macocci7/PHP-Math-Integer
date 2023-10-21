<?php

declare(strict_types=1);

namespace Macocci7\PhpMathInteger;

require_once('vendor/autoload.php');
require_once('src/Number.php');

use PHPUnit\Framework\TestCase;
use Macocci7\PhpMathInteger\Number;

final class NumberTest extends TestCase
{
    public function test_isInteger_can_judge_correctly(): void
    {
        $cases = [
            ['param' => null, 'expect' => false, ],
            ['param' => true, 'expect' => false, ],
            ['param' => false, 'expect' => false, ],
            ['param' => 0, 'expect' => true, ],
            ['param' => -1, 'expect' => true, ],
            ['param' => 2, 'expect' => true, ],
            ['param' => 0.0, 'expect' => false, ],
            ['param' => -1.2, 'expect' => false, ],
            ['param' => 2.3, 'expect' => false, ],
            ['param' => "3", 'expect' => false, ],
            ['param' => [], 'expect' => false, ],
        ];
        $n = new Number();
        foreach ($cases as $case) {
            $this->assertSame($n->isInt($case['param']), $case['expect']);
        }
    }

    public function test_isIntAll_can_judge_correctly(): void
    {
        $cases = [
            ['param' => [], 'expect' => false, ],
            ['param' => [0, ], 'expect' => true, ],
            ['param' => [0, 1, ], 'expect' => true, ],
            ['param' => [0, 1.2, ], 'expect' => false, ],
        ];
        $n = new Number();
        foreach ($cases as $case) {
            $this->assertSame($n->isIntAll($case['param']), $case['expect']);
        }
    }

    public function test_isNatural_can_judge_correctly(): void
    {
        $cases = [
            ['param' => null, 'expect' => false, ],
            ['param' => true, 'expect' => false, ],
            ['param' => false, 'expect' => false, ],
            ['param' => "1", 'expect' => false, ],
            ['param' => [1], 'expect' => false, ],
            ['param' => 0, 'expect' => false, ],
            ['param' => -1, 'expect' => false, ],
            ['param' => 1, 'expect' => true, ],
            ['param' => 0.0, 'expect' => false, ],
            ['param' => 1.2, 'expect' => false, ],
        ];
        $n = new Number();
        foreach ($cases as $case) {
            $this->assertSame($n->isNatural($case['param']), $case['expect']);
        }
    }

    public function test_isNaturalAll_can_judge_correctly(): void
    {
        $cases = [
            ['param' => [], 'expect' => false, ],
            ['param' => [0, ], 'expect' => false, ],
            ['param' => [-1, ], 'expect' => false, ],
            ['param' => [1, ], 'expect' => true, ],
            ['param' => [0, 1, ], 'expect' => false, ],
            ['param' => [1, 2, ], 'expect' => true, ],
        ];
        $n = new Number();
        foreach ($cases as $case) {
            $this->assertSame($n->isNaturalAll($case['param']), $case['expect']);
        }
    }

    public function test_isFloat_can_judge_correctly(): void
    {
        $cases = [
            ['param' => null, 'expect' => false, ],
            ['param' => true, 'expect' => false, ],
            ['param' => false, 'expect' => false, ],
            ['param' => "1.2", 'expect' => false, ],
            ['param' => [1.2], 'expect' => false, ],
            ['param' => 0, 'expect' => false, ],
            ['param' => 0.0, 'expect' => true, ],
            ['param' => -1.2, 'expect' => true, ],
            ['param' => 1.2, 'expect' => true, ],
            ['param' => 1, 'expect' => false, ],
            ['param' => -1, 'expect' => false, ],
        ];
        $n = new Number();
        foreach ($cases as $case) {
            $this->assertSame($n->isFloat($case['param']), $case['expect']);
        }
    }

    public function test_isFloatAll_can_judge_correctly(): void
    {
        $cases = [
            ['param' => [], 'expect' => false, ],
            ['param' => [0, ], 'expect' => false, ],
            ['param' => [0, 1.2], 'expect' => false, ],
            ['param' => [0.0, ], 'expect' => true, ],
            ['param' => [0.0, 1], 'expect' => false, ],
        ];
        $n = new Number();
        foreach ($cases as $case) {
            $this->assertSame($n->isFloatAll($case['param']), $case['expect']);
        }
    }

    public function test_isNumber_can_judge_correctly(): void
    {
        $cases = [
            ['param' => null, 'expect' => false, ],
            ['param' => true, 'expect' => false, ],
            ['param' => false, 'expect' => false, ],
            ['param' => "1", 'expect' => false, ],
            ['param' => [1, ], 'expect' => false, ],
            ['param' => 1, 'expect' => true, ],
            ['param' => 1.2, 'expect' => true, ],
        ];
        $n = new Number();
        foreach ($cases as $case) {
            $this->assertSame($n->isNumber($case['param']), $case['expect']);
        }
    }

    public function test_isNumberAll_can_judge_correctly(): void
    {
        $cases = [
            ['param' => [], 'expect' => false, ],
            ['param' => [0, ], 'expect' => true, ],
            ['param' => [0, 1, ], 'expect' => true, ],
            ['param' => ["0"], 'expect' => false, ],
            ['param' => [0, "1"], 'expect' => false, ],
        ];
        $n = new Number();
        foreach ($cases as $case) {
            $this->assertSame($n->isNumberAll($case['param']), $case['expect']);
        }
    }

    public function test_isFraction_can_judge_correctly(): void
    {
        $cases = [
            ['param' => null, 'expect' => false, ],
            ['param' => true, 'expect' => false, ],
            ['param' => false, 'expect' => false, ],
            ['param' => 0, 'expect' => false, ],
            ['param' => 1, 'expect' => false, ],
            ['param' => -1, 'expect' => false, ],
            ['param' => "0.1", 'expect' => false, ],
            ['param' => [0.1], 'expect' => false, ],
            ['param' => 0.0, 'expect' => false, ],
            ['param' => 0.1, 'expect' => true, ],
            ['param' => 0.9, 'expect' => true, ],
            ['param' => 1.0, 'expect' => false, ],
            ['param' => 1.1, 'expect' => false, ],
            ['param' => -0.1, 'expect' => true, ],
            ['param' => -0.9, 'expect' => true, ],
            ['param' => -1.0, 'expect' => false, ],
            ['param' => -1.1, 'expect' => false, ],
        ];
        $n = new Number();
        foreach ($cases as $case) {
            $this->assertSame($n->isFraction($case['param']), $case['expect']);
        }
    }

    public function test_getSign_can_get_sign_correctly(): void
    {
        $cases = [
            ['param' => null, 'expect' => null, ],
            ['param' => true, 'expect' => null, ],
            ['param' => false, 'expect' => null, ],
            ['param' => "-1", 'expect' => null, ],
            ['param' => [-1], 'expect' => null, ],
            ['param' => -2, 'expect' => -1, ],
            ['param' => -3.4, 'expect' => -1, ],
            ['param' => 0, 'expect' => 0, ],
            ['param' => 0.0, 'expect' => 0, ],
            ['param' => 2, 'expect' => 1, ],
            ['param' => 3.4, 'expect' => 1, ],
        ];
        $n = new Number();
        foreach ($cases as $case) {
            $this->assertSame($n->getSign($case['param']), $case['expect']);
        }
    }

    public function test_getInt_can_get_int_correctly(): void
    {
        $cases = [
            ['param' => null, 'expect' => null, ],
            ['param' => true, 'expect' => null, ],
            ['param' => false, 'expect' => null, ],
            ['param' => "1.2", 'expect' => null, ],
            ['param' => [1.2], 'expect' => null, ],
            ['param' => 0, 'expect' => 0, ],
            ['param' => 2, 'expect' => 2, ],
            ['param' => -2, 'expect' => -2, ],
            ['param' => 2.3, 'expect' => 2, ],
            ['param' => -2.3, 'expect' => -2, ],
        ];
        $n = new Number();
        foreach ($cases as $case) {
            $this->assertSame($n->getInt($case['param']), $case['expect']);
        }
    }

    public function test_getFraction_can_get_fraction_correctly(): void
    {
        $cases = [
            ['param' => null, 'expect' => null, ],
            ['param' => true, 'expect' => null, ],
            ['param' => false, 'expect' => null, ],
            ['param' => "1.2", 'expect' => null, ],
            ['param' => [1.2], 'expect' => null, ],
            ['param' => 0, 'expect' => 0.0, ],
            ['param' => 1, 'expect' => 0.0, ],
            ['param' => 1.2, 'expect' => (1.2 - 1), ],
            ['param' => 0.1, 'expect' => 0.1, ],
            ['param' => -1, 'expect' => 0.0, ],
            ['param' => -1.2, 'expect' => (-1.2 + 1), ],
            ['param' => -0.1, 'expect' => -0.1, ],
        ];
        $n = new Number();
        foreach ($cases as $case) {
            $this->assertSame($n->getFraction($case['param']), $case['expect']);
        }
    }

    public function test_getNthDigit_can_get_digit_correctly(): void
    {
        $cases = [
            ['nth' => 0, 'number' => null, 'expect' => null, ],
            ['nth' => 1, 'number' => null, 'expect' => null, ],
            ['nth' => 1, 'number' => true, 'expect' => null, ],
            ['nth' => 1, 'number' => false, 'expect' => null, ],
            ['nth' => 1, 'number' => "123.456", 'expect' => null, ],
            ['nth' => 1, 'number' => [123.456], 'expect' => null, ],
            ['nth' => 0, 'number' => 123.456, 'expect' => null, ],
            ['nth' => 1, 'number' => 123.456, 'expect' => 3, ],
            ['nth' => 2, 'number' => 123.456, 'expect' => 2, ],
            ['nth' => 3, 'number' => 123.456, 'expect' => 1, ],
            ['nth' => 4, 'number' => 123.456, 'expect' => null, ],
            ['nth' => -1, 'number' => 123.456, 'expect' => 4, ],
            ['nth' => -2, 'number' => 123.456, 'expect' => 5, ],
            ['nth' => -3, 'number' => 123.456, 'expect' => 6, ],
            ['nth' => -4, 'number' => 123.456, 'expect' => null, ],
        ];
        $n = new Number();
        foreach ($cases as $case) {
            $this->assertSame(
                $n->getNthDigit(
                    $case['nth'],
                    $case['number'],
                ),
                $case['expect']
            );
        }
    }

    public function test_getNumberOfDigits_can_get_number_of_digits_correctly(): void
    {
        $cases = [
            ['param' => null, 'expect' => null, ],
            ['param' => true, 'expect' => null, ],
            ['param' => false, 'expect' => null, ],
            ['param' => "123", 'expect' => null, ],
            ['param' => [123], 'expect' => null, ],
            ['param' => 0.0, 'expect' => 1, ],
            ['param' => 0, 'expect' => 1, ],
            ['param' => 1, 'expect' => 1, ],
            ['param' => 12, 'expect' => 2, ],
            ['param' => 123, 'expect' => 3, ],
            ['param' => -1, 'expect' => 1, ],
            ['param' => -12, 'expect' => 2, ],
            ['param' => -123, 'expect' => 3, ],
            ['param' => 1.2, 'expect' => 1, ],
            ['param' => 12.3, 'expect' => 2, ],
            ['param' => 123.4567, 'expect' => 3, ],
            ['param' => -1.2, 'expect' => 1, ],
            ['param' => -12.3, 'expect' => 2, ],
            ['param' => -123.4567, 'expect' => 3, ],
        ];
        $n = new Number();
        foreach ($cases as $case) {
            $this->assertSame($n->getNumberOfDigits($case['param']), $case['expect']);
        }
    }

    public function test_getNumberOfFractionalDigits_can_get_number_correctly(): void
    {
        $cases = [
            ['param' => null, 'expect' => null, ],
            ['param' => true, 'expect' => null, ],
            ['param' => false, 'expect' => null, ],
            ['param' => "123.4567", 'expect' => null, ],
            ['param' => [123.4567], 'expect' => null, ],
            ['param' => 0, 'expect' => 0, ],
            ['param' => 1, 'expect' => 0, ],
            ['param' => -1, 'expect' => 0, ],
            ['param' => 0.0, 'expect' => 0, ],
            ['param' => 1.0, 'expect' => 0, ],
            ['param' => 0.1, 'expect' => 1, ],
            ['param' => 1.23, 'expect' => 2, ],
            ['param' => 12.345, 'expect' => 3, ],
            ['param' => -1.0, 'expect' => 0, ],
            ['param' => -0.1, 'expect' => 1, ],
            ['param' => -1.23, 'expect' => 2, ],
            ['param' => -12.345, 'expect' => 3, ],
        ];
        $n = new Number();
        foreach ($cases as $case) {
            $this->assertSame(
                $n->getNumberOfFractionalDigits($case['param']),
                $case['expect']
            );
        }
    }
}
