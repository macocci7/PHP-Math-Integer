<?php

declare(strict_types=1);

namespace Macocci7\PhpMathInteger;

require_once('vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Macocci7\PhpMathInteger\Number;

/**
 * @SuppressWarnings(PHPMD.CamelCaseMethodName)
 * @SuppressWarnings(PHPMD.TooManyMethods)
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
final class NumberTest extends TestCase
{
    public static function provide_isInt_can_judge_correctly(): array
    {
        return [
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
    }

    /**
     * @dataProvider provide_isInt_can_judge_correctly
     */
    public function test_isInt_can_judge_correctly(mixed $param, bool $expect): void
    {
        $n = new Number();
        $this->assertSame($n->isInt($param), $expect);
    }

    public static function provide_isIntAll_can_judge_correctly(): array
    {
        return [
            ['param' => [], 'expect' => false, ],
            ['param' => [0, ], 'expect' => true, ],
            ['param' => [0, 1, ], 'expect' => true, ],
            ['param' => [0, 1.2, ], 'expect' => false, ],
        ];
    }

    /**
     * @dataProvider provide_isIntAll_can_judge_correctly
     */
    public function test_isIntAll_can_judge_correctly(array $param, bool $expect): void
    {
        $n = new Number();
        $this->assertSame($n->isIntAll($param), $expect);
    }

    public static function provide_isNatural_can_judge_correctly(): array
    {
        return [
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
    }

    /**
     * @dataProvider provide_isNatural_can_judge_correctly
     */
    public function test_isNatural_can_judge_correctly(mixed $param, bool $expect): void
    {
        $n = new Number();
        $this->assertSame($n->isNatural($param), $expect);
    }

    public static function provide_isNaturalAll_can_judge_correctly(): array
    {
        return [
            ['param' => [], 'expect' => false, ],
            ['param' => [0, ], 'expect' => false, ],
            ['param' => [-1, ], 'expect' => false, ],
            ['param' => [1, ], 'expect' => true, ],
            ['param' => [0, 1, ], 'expect' => false, ],
            ['param' => [1, 2, ], 'expect' => true, ],
        ];
    }

    /**
     * @dataProvider provide_isNaturalAll_can_judge_correctly
     */
    public function test_isNaturalAll_can_judge_correctly(array $param, bool $expect): void
    {
        $n = new Number();
        $this->assertSame($n->isNaturalAll($param), $expect);
    }

    public static function provide_isFloat_can_judge_correctly(): array
    {
        return [
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
    }

    /**
     * @dataProvider provide_isFloat_can_judge_correctly
     */
    public function test_isFloat_can_judge_correctly(mixed $param, bool $expect): void
    {
        $n = new Number();
        $this->assertSame($n->isFloat($param), $expect);
    }

    public static function provide_isFloatAll_can_judge_correctly(): array
    {
        return [
            ['param' => [], 'expect' => false, ],
            ['param' => [0, ], 'expect' => false, ],
            ['param' => [0, 1.2], 'expect' => false, ],
            ['param' => [0.0, ], 'expect' => true, ],
            ['param' => [0.0, 1], 'expect' => false, ],
        ];
    }

    /**
     * @dataProvider provide_isFloatAll_can_judge_correctly
     */
    public function test_isFloatAll_can_judge_correctly(array $param, bool $expect): void
    {
        $n = new Number();
        $this->assertSame($n->isFloatAll($param), $expect);
    }

    public static function provide_isNumber_can_judge_correctly(): array
    {
        return [
            ['param' => null, 'expect' => false, ],
            ['param' => true, 'expect' => false, ],
            ['param' => false, 'expect' => false, ],
            ['param' => "1", 'expect' => false, ],
            ['param' => [1, ], 'expect' => false, ],
            ['param' => 1, 'expect' => true, ],
            ['param' => 1.2, 'expect' => true, ],
        ];
    }

    /**
     * @dataProvider provide_isNumber_can_judge_correctly
     */
    public function test_isNumber_can_judge_correctly(mixed $param, bool $expect): void
    {
        $n = new Number();
        $this->assertSame($n->isNumber($param), $expect);
    }

    public static function provide_isNumberAll_can_judge_correctly(): array
    {
        return [
            ['param' => [], 'expect' => false, ],
            ['param' => [0, ], 'expect' => true, ],
            ['param' => [0, 1, ], 'expect' => true, ],
            ['param' => ["0"], 'expect' => false, ],
            ['param' => [0, "1"], 'expect' => false, ],
        ];
    }

    /**
     * @dataProvider provide_isNumberAll_can_judge_correctly
     */
    public function test_isNumberAll_can_judge_correctly(array $param, bool $expect): void
    {
        $n = new Number();
        $this->assertSame($n->isNumberAll($param), $expect);
    }

    public static function provide_isFraction_can_judge_correctly(): array
    {
        return [
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
    }

    /**
     * @dataProvider provide_isFraction_can_judge_correctly
     */
    public function test_isFraction_can_judge_correctly(mixed $param, bool $expect): void
    {
        $n = new Number();
        $this->assertSame($n->isFraction($param), $expect);
    }

    public static function provide_isFractionAll_can_judge_correctly(): array
    {
        return [
            ['param' => [], 'expect' => false, ],
            ['param' => [0.1, ], 'expect' => true, ],
            ['param' => [1.1, ], 'expect' => false, ],
            ['param' => [1, ], 'expect' => false, ],
            ['param' => [-1.0, ], 'expect' => false, ],
            ['param' => [1.0, ], 'expect' => false, ],
            ['param' => [-0.99, 0.2, 0.99, ], 'expect' => true, ],
            ['param' => ["0.1"], 'expect' => false, ],
            ['param' => [0.1, "0.1"], 'expect' => false, ],
        ];
    }

    /**
     * @dataProvider provide_isFractionAll_can_judge_correctly
     */
    public function test_isFractionAll_can_judge_correctly(array $param, bool $expect): void
    {
        $n = new Number();
        $this->assertSame($n->isFractionAll($param), $expect);
    }

    public static function provide_sign_can_return_sign_correctly(): array
    {
        return [
            ['param' => null, 'expect' => null, ],
            ['param' => -2, 'expect' => -1, ],
            ['param' => -3.4, 'expect' => -1, ],
            ['param' => 0, 'expect' => 0, ],
            ['param' => 0.0, 'expect' => 0, ],
            ['param' => 2, 'expect' => 1, ],
            ['param' => 3.4, 'expect' => 1, ],
        ];
    }

    /**
     * @dataProvider provide_sign_can_return_sign_correctly
     */
    public function test_sign_can_return_sign_correctly(mixed $param, int|null $expect): void
    {
        $n = new Number();
        $this->assertSame($n->sign($param), $expect);
    }

    public static function provide_int_can_return_int_correctly(): array
    {
        return [
            ['param' => 0.3, 'expect' => 0, ],
            ['param' => -0.3, 'expect' => 0, ],
            ['param' => 2.3, 'expect' => 2, ],
            ['param' => -2.3, 'expect' => -2, ],
        ];
    }

    /**
     * @dataProvider provide_int_can_return_int_correctly
     */
    public function test_int_can_return_int_correctly(float $param, int $expect): void
    {
        $n = new Number();
        $this->assertSame($n->int($param), $expect);
    }

    public static function provide_fraction_can_return_fraction_correctly(): array
    {
        return [
            ['param' => 1.2, 'expect' => (1.2 - 1), ],
            ['param' => 0.1, 'expect' => 0.1, ],
            ['param' => -1.2, 'expect' => (-1.2 + 1), ],
            ['param' => -0.1, 'expect' => -0.1, ],
            ['param' => -1.0, 'expect' => 0.0, ],
            ['param' => .1, 'expect' => 0.1, ],
        ];
    }

    /**
     * @dataProvider provide_fraction_can_return_fraction_correctly
     */
    public function test_fraction_can_return_fraction_correctly(float $param, float $expect): void
    {
        $n = new Number();
        $this->assertSame($n->fraction($param), $expect);
    }

    public static function provide_nthDigit_can_return_digit_correctly(): array
    {
        return [
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
    }

    /**
     * @dataProvider provide_nthDigit_can_return_digit_correctly
     */
    public function test_nthDigit_can_return_digit_correctly(int $nth, float $number, int|null $expect): void
    {
        $n = new Number();
        $this->assertSame(
            $n->nthDigit(
                $nth,
                $number,
            ),
            $expect
        );
    }

    public static function provide_numberOfDigits_can_return_number_of_digits_correctly(): array
    {
        return [
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
    }

    /**
     * @dataProvider provide_numberOfDigits_can_return_number_of_digits_correctly
     */
    public function test_numberOfDigits_can_return_number_of_digits_correctly(int|float $param, int|null $expect): void
    {
        $n = new Number();
        $this->assertSame($n->numberOfDigits($param), $expect);
    }

    public static function provide_numberOfFractionalDigits_can_return_number_correctly(): array
    {
        return [
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
    }

    /**
     * @dataProvider provide_numberOfFractionalDigits_can_return_number_correctly
     */
    public function test_numberOfFractionalDigits_can_return_number_correctly(float $param, int $expect): void
    {
        $n = new Number();
        $this->assertSame(
            $n->numberOfFractionalDigits($param),
            $expect
        );
    }
}
