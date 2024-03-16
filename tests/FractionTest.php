<?php

declare(strict_types=1);

namespace Macocci7\PhpMathInteger;

require_once('vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Macocci7\PhpMathInteger\Fraction;

/**
 * @SuppressWarnings(PHPMD.CamelCaseMethodName)
 * @SuppressWarnings(PHPMD.TooManyMethods)
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 */
final class FractionTest extends TestCase
{
    public static function provide_set_can_throw_exception_with_invalid_param(): array
    {
        return [
            ['param' => '', 'message' => 'Invalid string specified.', ],
            ['param' => '', 'message' => 'Invalid string specified.', ],
            ['param' => '', 'message' => 'Invalid string specified.', ],
            ['param' => '', 'message' => 'Invalid string specified.', ],
        ];
    }

    /**
     * @dataProvider provide_set_can_throw_exception_with_invalid_param
     */
    public function test_set_can_throw_exception_with_invalid_param(string $param, string $message): void
    {
        $f = new Fraction();
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage($message);
        $f->set($param);
    }

    public static function provide_set_can_set_values_correctly(): array
    {
        return [
            ['param' => '1/2', 'expect' => ['w' => null, 'n' => 1, 'd' => 2, ], ],
            ['param' => '1 2/3', 'expect' => ['w' => 1, 'n' => 2, 'd' => 3, ], ],
            ['param' => '4 3/2', 'expect' => ['w' => 4, 'n' => 3, 'd' => 2, ], ],
            ['param' => '0 0/0', 'expect' => ['w' => 0, 'n' => 0, 'd' => 0, ], ],
        ];
    }

    /**
     * @dataProvider provide_set_can_set_values_correctly
     */
    public function test_set_can_set_values_correctly(string $param, array $expect): void
    {
        $f = new Fraction();
        $f->set($param);
        $this->assertTrue(
            $f->wholeNumbers === $expect['w']
            && $f->numerator === $expect['n']
            && $f->denominator === $expect['d']
        );
    }

    public static function provide_isReduced_can_judge_correctly(): array
    {
        return [
            ['w' => null, 'n' => -10, 'd' => -10, 'expect' => false, ],
            ['w' => null, 'n' => -1, 'd' => -1, 'expect' => false, ],
            ['w' => null, 'n' => 0, 'd' => 0, 'expect' => false, ],
            ['w' => null, 'n' => 0, 'd' => 1, 'expect' => false, ],
            ['w' => null, 'n' => 1, 'd' => 0, 'expect' => false, ],
            ['w' => null, 'n' => 1, 'd' => 1, 'expect' => true, ],
            ['w' => null, 'n' => 1, 'd' => 2, 'expect' => true, ],
            ['w' => null, 'n' => 2, 'd' => 3, 'expect' => true, ],
            ['w' => null, 'n' => 2, 'd' => 4, 'expect' => false, ],
            ['w' => null, 'n' => 2, 'd' => 1, 'expect' => true, ],
            ['w' => null, 'n' => 4, 'd' => 2, 'expect' => false, ],
            ['w' => null, 'n' => 4, 'd' => 3, 'expect' => true, ],
            ['w' => 1, 'n' => 2, 'd' => 3, 'expect' => true, ],
            ['w' => 1, 'n' => 2, 'd' => 4, 'expect' => false, ],
        ];
    }

    /**
     * @dataProvider provide_isReduced_can_judge_correctly
     */
    public function test_isReduced_can_judge_correctly(int|null $w, int $n, int $d, bool $expect): void
    {
        $f = new Fraction();
        $f->wholeNumbers = $w;
        $f->numerator = $n;
        $f->denominator = $d;
        $this->assertSame($expect, $f->isReduced());
    }

    public static function provide_isProper_can_judge_correctly(): array
    {
        return [
            ['w' => null, 'n' => -10, 'd' => -10, 'expect' => false],
            ['w' => null, 'n' => -1, 'd' => -1, 'expect' => false],
            ['w' => null, 'n' => 0, 'd' => 0, 'expect' => false],
            ['w' => null, 'n' => 0, 'd' => 1, 'expect' => false],
            ['w' => null, 'n' => 1, 'd' => 0, 'expect' => false],
            ['w' => null, 'n' => 1, 'd' => 1, 'expect' => false],
            ['w' => null, 'n' => 1, 'd' => 2, 'expect' => true],
            ['w' => null, 'n' => 2, 'd' => 1, 'expect' => false],
            ['w' => null, 'n' => 2, 'd' => 2, 'expect' => false],
            ['w' => null, 'n' => 2, 'd' => 3, 'expect' => true],
            ['w' => null, 'n' => 2, 'd' => 4, 'expect' => true],
            ['w' => -1, 'n' => 2, 'd' => 3, 'expect' => false],
            ['w' => 0, 'n' => 2, 'd' => 3, 'expect' => false],
            ['w' => 1, 'n' => 2, 'd' => 3, 'expect' => false],
            ['w' => 2, 'n' => 2, 'd' => 3, 'expect' => false],
        ];
    }

    /**
     * @dataProvider provide_isProper_can_judge_correctly
     */
    public function test_isProper_can_judge_correctly(int|null $w, int $n, int $d, bool $expect): void
    {
        $f = new Fraction();
        $f->wholeNumbers = $w;
        $f->numerator = $n;
        $f->denominator = $d;
        $this->assertSame($expect, $f->isProper());
    }

    public static function provide_isImproper_can_judge_correctly(): array
    {
        return [
            ['w' => null, 'n' => -10, 'd' => -10, 'expect' => false, ],
            ['w' => null, 'n' => -1, 'd' => -1, 'expect' => false, ],
            ['w' => null, 'n' => 0, 'd' => 0, 'expect' => false, ],
            ['w' => null, 'n' => 0, 'd' => 1, 'expect' => false, ],
            ['w' => null, 'n' => 1, 'd' => 0, 'expect' => false, ],
            ['w' => null, 'n' => 1, 'd' => 1, 'expect' => false, ],
            ['w' => null, 'n' => 1, 'd' => 2, 'expect' => false, ],
            ['w' => null, 'n' => 2, 'd' => 1, 'expect' => true, ],
            ['w' => null, 'n' => 3, 'd' => 2, 'expect' => true, ],
            ['w' => null, 'n' => 3, 'd' => 3, 'expect' => false, ],
            ['w' => null, 'n' => 3, 'd' => 4, 'expect' => false, ],
            ['w' => null, 'n' => 4, 'd' => 2, 'expect' => true, ],
            ['w' => -1, 'n' => 3, 'd' => 2, 'expect' => false, ],
            ['w' => 0, 'n' => 3, 'd' => 2, 'expect' => false, ],
            ['w' => 1, 'n' => 3, 'd' => 2, 'expect' => false, ],
            ['w' => 2, 'n' => 3, 'd' => 2, 'expect' => false, ],
        ];
    }

    /**
     * @dataProvider provide_isImproper_can_judge_correctly
     */
    public function test_isImproper_can_judge_correctly(int|null $w, int $n, int $d, bool $expect): void
    {
        $f = new Fraction();
        $f->wholeNumbers = $w;
        $f->numerator = $n;
        $f->denominator = $d;
        $this->assertSame($expect, $f->isImproper());
    }

    public static function provide_isMixed_can_judge_correctly(): array
    {
        return [
            ['w' => null, 'n' => -10, 'd' => -10, 'expect' => false, ],
            ['w' => null, 'n' => -1, 'd' => -1, 'expect' => false, ],
            ['w' => null, 'n' => 0, 'd' => 0, 'expect' => false, ],
            ['w' => null, 'n' => 0, 'd' => 1, 'expect' => false, ],
            ['w' => null, 'n' => 1, 'd' => 0, 'expect' => false, ],
            ['w' => null, 'n' => 1, 'd' => 2, 'expect' => false, ],
            ['w' => -1, 'n' => 1, 'd' => 2, 'expect' => true, ],
            ['w' => 0, 'n' => 1, 'd' => 2, 'expect' => false, ],
            ['w' => 1, 'n' => null, 'd' => null, 'expect' => true, ],
            ['w' => 1, 'n' => -1, 'd' => -2, 'expect' => true, ],
            ['w' => 1, 'n' => 0, 'd' => 0, 'expect' => true, ],
            ['w' => 1, 'n' => 1, 'd' => 1, 'expect' => true, ],
            ['w' => 1, 'n' => 1, 'd' => 2, 'expect' => true, ],
        ];
    }

    /**
     * @dataProvider provide_isMixed_can_judge_correctly
     */
    public function test_isMixed_can_judge_correctly(int|null $w, int|null $n, int|null $d, bool $expect): void
    {
        $f = new Fraction();
        $f->wholeNumbers = $w;
        $f->numerator = $n;
        $f->denominator = $d;
        $this->assertSame($expect, $f->isMixed());
    }

    public static function provide_reduce_can_reduce_fraction_correctly(): array
    {
        return [
            ['preset' => ['w' => null, 'n' => -10, 'd' => -10, ], 'expect' => ['w' => null, 'n' => -10, 'd' => -10, ], ],
            ['preset' => ['w' => null, 'n' => -1, 'd' => -1, ], 'expect' => ['w' => null, 'n' => -1, 'd' => -1, ], ],
            ['preset' => ['w' => null, 'n' => 0, 'd' => 0, ], 'expect' => ['w' => null, 'n' => 0, 'd' => 0, ], ],
            ['preset' => ['w' => null, 'n' => 1, 'd' => 1, ], 'expect' => ['w' => null, 'n' => 1, 'd' => 1, ], ],
            ['preset' => ['w' => null, 'n' => 1, 'd' => 2, ], 'expect' => ['w' => null, 'n' => 1, 'd' => 2, ], ],
            ['preset' => ['w' => null, 'n' => 1, 'd' => 3, ], 'expect' => ['w' => null, 'n' => 1, 'd' => 3, ], ],
            ['preset' => ['w' => null, 'n' => 2, 'd' => 1, ], 'expect' => ['w' => null, 'n' => 2, 'd' => 1, ], ],
            ['preset' => ['w' => null, 'n' => 2, 'd' => 2, ], 'expect' => ['w' => null, 'n' => 1, 'd' => 1, ], ],
            ['preset' => ['w' => null, 'n' => 2, 'd' => 3, ], 'expect' => ['w' => null, 'n' => 2, 'd' => 3, ], ],
            ['preset' => ['w' => null, 'n' => 2, 'd' => 4, ], 'expect' => ['w' => null, 'n' => 1, 'd' => 2, ], ],
            ['preset' => ['w' => null, 'n' => 2, 'd' => 5, ], 'expect' => ['w' => null, 'n' => 2, 'd' => 5, ], ],
            ['preset' => ['w' => null, 'n' => 2, 'd' => 6, ], 'expect' => ['w' => null, 'n' => 1, 'd' => 3, ], ],
            ['preset' => ['w' => null, 'n' => 3, 'd' => 1, ], 'expect' => ['w' => null, 'n' => 3, 'd' => 1, ], ],
            ['preset' => ['w' => null, 'n' => 3, 'd' => 2, ], 'expect' => ['w' => null, 'n' => 3, 'd' => 2, ], ],
            ['preset' => ['w' => null, 'n' => 3, 'd' => 3, ], 'expect' => ['w' => null, 'n' => 1, 'd' => 1, ], ],
            ['preset' => ['w' => null, 'n' => 3, 'd' => 4, ], 'expect' => ['w' => null, 'n' => 3, 'd' => 4, ], ],
            ['preset' => ['w' => null, 'n' => 3, 'd' => 5, ], 'expect' => ['w' => null, 'n' => 3, 'd' => 5, ], ],
            ['preset' => ['w' => null, 'n' => 3, 'd' => 6, ], 'expect' => ['w' => null, 'n' => 1, 'd' => 2, ], ],
            ['preset' => ['w' => null, 'n' => 4, 'd' => 2, ], 'expect' => ['w' => null, 'n' => 2, 'd' => 1, ], ],
            ['preset' => ['w' => null, 'n' => 6, 'd' => 2, ], 'expect' => ['w' => null, 'n' => 3, 'd' => 1, ], ],
            ['preset' => ['w' => null, 'n' => 6, 'd' => 3, ], 'expect' => ['w' => null, 'n' => 2, 'd' => 1, ], ],
            ['preset' => ['w' => null, 'n' => 6, 'd' => 4, ], 'expect' => ['w' => null, 'n' => 3, 'd' => 2, ], ],
            ['preset' => ['w' => 1, 'n' => 1, 'd' => 1, ], 'expect' => ['w' => 1, 'n' => 1, 'd' => 1, ], ],
            ['preset' => ['w' => 1, 'n' => 2, 'd' => 3, ], 'expect' => ['w' => 1, 'n' => 2, 'd' => 3, ], ],
            ['preset' => ['w' => 1, 'n' => 2, 'd' => 4, ], 'expect' => ['w' => 1, 'n' => 1, 'd' => 2, ], ],
            ['preset' => ['w' => 2, 'n' => 1, 'd' => 1, ], 'expect' => ['w' => 2, 'n' => 1, 'd' => 1, ], ],
            ['preset' => ['w' => 2, 'n' => 2, 'd' => 3, ], 'expect' => ['w' => 2, 'n' => 2, 'd' => 3, ], ],
            ['preset' => ['w' => 2, 'n' => 2, 'd' => 4, ], 'expect' => ['w' => 2, 'n' => 1, 'd' => 2, ], ],
        ];
    }

    /**
     * @dataProvider provide_reduce_can_reduce_fraction_correctly
     */
    public function test_reduce_can_reduce_fraction_correctly(array $preset, array $expect): void
    {
        $f = new Fraction();
        $f->wholeNumbers = $preset['w'];
        $f->numerator = $preset['n'];
        $f->denominator = $preset['d'];
        $f->reduce();
        $this->assertTrue(
            $f->wholeNumbers === $expect['w']
            && $f->numerator === $expect['n']
            && $f->denominator === $expect['d']
        );
    }

    public static function provide_add_can_throw_exception_with_invalid_preset(): array
    {
        return [
            [
                'preset1' => [ 'w' => null, 'n' => null, 'd' => null, ],
                'preset2' => [ 'w' => null, 'n' => null, 'd' => null, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => null, ],
                'preset2' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => 0, ],
                'preset2' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
                'preset2' => [ 'w' => 2, 'n' => 1, 'd' => null, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
                'preset2' => [ 'w' => 2, 'n' => 1, 'd' => 0, ],
            ],
        ];
    }

    /**
     * @dataProvider provide_add_can_throw_exception_with_invalid_preset
     */
    public function test_add_can_throw_exception_with_invalid_preset(array $preset1, array $preset2): void
    {
        $f1 = new Fraction();
        $f2 = new Fraction();
        $f1->wholeNumbers = $preset1['w'];
        $f1->numerator = $preset1['n'];
        $f1->denominator = $preset1['d'];
        $f2->wholeNumbers = $preset2['w'];
        $f2->numerator = $preset2['n'];
        $f2->denominator = $preset2['d'];
        $this->expectException(\Exception::class);
        $this->expectExceptionCode(1);
        $this->expectExceptionMessage('denominator must not be null nor zero.');
        $f1->add($f2);
    }

    public static function provide_add_can_add_a_fraction_correctly(): array
    {
        return [
            [
                'preset1' => [ 'w' => null, 'n' => 0, 'd' => 1, ],
                'preset2' => [ 'w' => null, 'n' => 1, 'd' => 2, ],
                'expect' => [ 'w' => null, 'n' => 1, 'd' => 2, ],
            ],
            [
                'preset1' => [ 'w' => null, 'n' => 0, 'd' => 1, ],
                'preset2' => [ 'w' => 1, 'n' => 2, 'd' => 1, ],
                'expect' => [ 'w' => null, 'n' => 3, 'd' => 1, ],
            ],
            [
                'preset1' => [ 'w' => null, 'n' => 0, 'd' => 1, ],
                'preset2' => [ 'w' => 1, 'n' => 2, 'd' => 2, ],
                'expect' => [ 'w' => null, 'n' => 2, 'd' => 1, ],
            ],
            [
                'preset1' => [ 'w' => null, 'n' => 0, 'd' => 1, ],
                'preset2' => [ 'w' => 1, 'n' => 2, 'd' => 3, ],
                'expect' => [ 'w' => null, 'n' => 5, 'd' => 3, ],
            ],
            [
                'preset1' => [ 'w' => 1, 'n' => 1, 'd' => 2, ],
                'preset2' => [ 'w' => 1, 'n' => 2, 'd' => 3, ],
                'expect' => [ 'w' => null, 'n' => 19, 'd' => 6, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => 3, ],
                'preset2' => [ 'w' => 3, 'n' => 1, 'd' => 6, ],
                'expect' => [ 'w' => null, 'n' => 11, 'd' => 2, ],
            ],
        ];
    }

    /**
     * @dataProvider provide_add_can_add_a_fraction_correctly
     */
    public function test_add_can_add_a_fraction_correctly(array $preset1, array $preset2, array $expect): void
    {
        $f1 = new Fraction();
        $f2 = new Fraction();
        $f1->wholeNumbers = $preset1['w'];
        $f1->numerator = $preset1['n'];
        $f1->denominator = $preset1['d'];
        $f2->wholeNumbers = $preset2['w'];
        $f2->numerator = $preset2['n'];
        $f2->denominator = $preset2['d'];
        $f1->add($f2);
        $this->assertTrue(
            $f1->wholeNumbers === $expect['w']
            && $f1->numerator === $expect['n']
            && $f1->denominator === $expect['d']
        );
    }

    public static function provide_substract_can_throw_exception_with_invalid_preset(): array
    {
        return [
            [
                'preset1' => [ 'w' => null, 'n' => null, 'd' => null, ],
                'preset2' => [ 'w' => null, 'n' => null, 'd' => null, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => null, ],
                'preset2' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => 0, ],
                'preset2' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
                'preset2' => [ 'w' => 2, 'n' => 1, 'd' => null, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
                'preset2' => [ 'w' => 2, 'n' => 1, 'd' => 0, ],
            ],
        ];
    }

    /**
     * @dataProvider provide_substract_can_throw_exception_with_invalid_preset
     */
    public function test_substract_can_throw_exception_with_invalid_preset(array $preset1, array $preset2): void
    {
        $f1 = new Fraction();
        $f2 = new Fraction();
        $f1->wholeNumbers = $preset1['w'];
        $f1->numerator = $preset1['n'];
        $f1->denominator = $preset1['d'];
        $f2->wholeNumbers = $preset2['w'];
        $f2->numerator = $preset2['n'];
        $f2->denominator = $preset2['d'];
        $this->expectException(\Exception::class);
        $this->expectExceptionCode(1);
        $this->expectExceptionMessage('denominator must not be null nor zero.');
        $f1->substract($f2);
    }

    public static function provide_substract_can_substract_a_fraction_correctly(): array
    {
        return [
            [
                'preset1' => [ 'w' => null, 'n' => 0, 'd' => 1, ],
                'preset2' => [ 'w' => null, 'n' => 1, 'd' => 2, ],
                'expect' => [ 'w' => null, 'n' => -1, 'd' => 2, ],
            ],
            [
                'preset1' => [ 'w' => null, 'n' => 0, 'd' => 1, ],
                'preset2' => [ 'w' => 1, 'n' => 2, 'd' => 1, ],
                'expect' => [ 'w' => null, 'n' => -3, 'd' => 1, ],
            ],
            [
                'preset1' => [ 'w' => null, 'n' => 0, 'd' => 1, ],
                'preset2' => [ 'w' => 1, 'n' => 2, 'd' => 2, ],
                'expect' => [ 'w' => null, 'n' => -2, 'd' => 1, ],
            ],
            [
                'preset1' => [ 'w' => null, 'n' => 0, 'd' => 1, ],
                'preset2' => [ 'w' => 1, 'n' => 2, 'd' => 3, ],
                'expect' => [ 'w' => null, 'n' => -5, 'd' => 3, ],
            ],
            [
                'preset1' => [ 'w' => 1, 'n' => 1, 'd' => 2, ],
                'preset2' => [ 'w' => 1, 'n' => 2, 'd' => 3, ],
                'expect' => [ 'w' => null, 'n' => -1, 'd' => 6, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 5, 'd' => 6, ],
                'preset2' => [ 'w' => 3, 'n' => 1, 'd' => 3, ],
                'expect' => [ 'w' => null, 'n' => -1, 'd' => 2, ],
            ],
        ];
    }

    /**
     * @dataProvider provide_substract_can_substract_a_fraction_correctly
     */
    public function test_substract_can_substract_a_fraction_correctly(array $preset1, array $preset2, array $expect): void
    {
        $f1 = new Fraction();
        $f2 = new Fraction();
        $f1->wholeNumbers = $preset1['w'];
        $f1->numerator = $preset1['n'];
        $f1->denominator = $preset1['d'];
        $f2->wholeNumbers = $preset2['w'];
        $f2->numerator = $preset2['n'];
        $f2->denominator = $preset2['d'];
        $f1->substract($f2);
        $this->assertTrue(
            $f1->wholeNumbers === $expect['w']
            && $f1->numerator === $expect['n']
            && $f1->denominator === $expect['d']
        );
    }

    public static function provide_multiply_can_throw_exception_with_invalid_preset(): array
    {
        return [
            [
                'preset1' => [ 'w' => null, 'n' => null, 'd' => null, ],
                'preset2' => [ 'w' => null, 'n' => null, 'd' => null, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => null, ],
                'preset2' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => 0, ],
                'preset2' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
                'preset2' => [ 'w' => 2, 'n' => 1, 'd' => null, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
                'preset2' => [ 'w' => 2, 'n' => 1, 'd' => 0, ],
            ],
        ];
    }

    /**
     * @dataProvider provide_multiply_can_throw_exception_with_invalid_preset
     */
    public function test_multiply_can_throw_exception_with_invalid_preset(array $preset1, array $preset2): void
    {
        $f1 = new Fraction();
        $f2 = new Fraction();
        $f1->wholeNumbers = $preset1['w'];
        $f1->numerator = $preset1['n'];
        $f1->denominator = $preset1['d'];
        $f2->wholeNumbers = $preset2['w'];
        $f2->numerator = $preset2['n'];
        $f2->denominator = $preset2['d'];
        $this->expectException(\Exception::class);
        $this->expectExceptionCode(1);
        $this->expectExceptionMessage('denominator must not be null nor zero.');
        $f1->multiply($f2);
    }

    public static function provide_multiply_can_multiply_by_a_fraction_correctly(): array
    {
        return [
            [
                'preset1' => [ 'w' => null, 'n' => 0, 'd' => 1, ],
                'preset2' => [ 'w' => null, 'n' => 1, 'd' => 2, ],
                'expect' => [ 'w' => null, 'n' => 0, 'd' => 2, ],
            ],
            [
                'preset1' => [ 'w' => null, 'n' => 0, 'd' => 1, ],
                'preset2' => [ 'w' => 1, 'n' => 2, 'd' => 1, ],
                'expect' => [ 'w' => null, 'n' => 0, 'd' => 1, ],
            ],
            [
                'preset1' => [ 'w' => null, 'n' => 0, 'd' => 1, ],
                'preset2' => [ 'w' => 1, 'n' => 2, 'd' => 3, ],
                'expect' => [ 'w' => null, 'n' => 0, 'd' => 3, ],
            ],
            [
                'preset1' => [ 'w' => 1, 'n' => 1, 'd' => 2, ],
                'preset2' => [ 'w' => 1, 'n' => 2, 'd' => 3, ],
                'expect' => [ 'w' => null, 'n' => 5, 'd' => 2, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 5, 'd' => 6, ],
                'preset2' => [ 'w' => 3, 'n' => 1, 'd' => 3, ],
                'expect' => [ 'w' => null, 'n' => 85, 'd' => 9, ],
            ],
            [
                'preset1' => [ 'w' => null, 'n' => 9, 'd' => 4, ],
                'preset2' => [ 'w' => null, 'n' => 8, 'd' => 3, ],
                'expect' => [ 'w' => null, 'n' => 6, 'd' => 1, ],
            ],
        ];
    }

    /**
     * @dataProvider provide_multiply_can_multiply_by_a_fraction_correctly
     */
    public function test_multiply_can_multiply_by_a_fraction_correctly(array $preset1, array $preset2, array $expect): void
    {
        $f1 = new Fraction();
        $f2 = new Fraction();
        $f1->wholeNumbers = $preset1['w'];
        $f1->numerator = $preset1['n'];
        $f1->denominator = $preset1['d'];
        $f2->wholeNumbers = $preset2['w'];
        $f2->numerator = $preset2['n'];
        $f2->denominator = $preset2['d'];
        $f1->multiply($f2);
        $this->assertTrue(
            $f1->wholeNumbers === $expect['w']
            && $f1->numerator === $expect['n']
            && $f1->denominator === $expect['d']
        );
    }

    public static function provide_divide_can_throw_exception_with_invalid_denominator(): array
    {
        return [
            [
                'preset1' => [ 'w' => null, 'n' => null, 'd' => null, ],
                'preset2' => [ 'w' => null, 'n' => null, 'd' => null, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => null, ],
                'preset2' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => 0, ],
                'preset2' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
                'preset2' => [ 'w' => 2, 'n' => 1, 'd' => null, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
                'preset2' => [ 'w' => 2, 'n' => 1, 'd' => 0, ],
            ],
        ];
    }

    /**
     * @dataProvider provide_divide_can_throw_exception_with_invalid_denominator
     */
    public function test_divide_can_throw_exception_with_invalid_denominator(array $preset1, array $preset2): void
    {
        $f1 = new Fraction();
        $f2 = new Fraction();
        $f1->wholeNumbers = $preset1['w'];
        $f1->numerator = $preset1['n'];
        $f1->denominator = $preset1['d'];
        $f2->wholeNumbers = $preset2['w'];
        $f2->numerator = $preset2['n'];
        $f2->denominator = $preset2['d'];
        $this->expectException(\Exception::class);
        $this->expectExceptionCode(1);
        $this->expectExceptionMessage('denominator must not be null nor zero.');
        $f1->divide($f2);
    }

    public static function provide_divide_can_throw_exception_with_invalid_divisor(): array
    {
        return [
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
                'preset2' => [ 'w' => 2, 'n' => 0, 'd' => 1, ],
            ],
        ];
    }

    /**
     * @dataProvider provide_divide_can_throw_exception_with_invalid_divisor
     */
    public function test_divide_can_throw_exception_with_invalid_divisor(array $preset1, array $preset2): void
    {
        $f1 = new Fraction();
        $f2 = new Fraction();
        $f1->wholeNumbers = $preset1['w'];
        $f1->numerator = $preset1['n'];
        $f1->denominator = $preset1['d'];
        $f2->wholeNumbers = $preset2['w'];
        $f2->numerator = $preset2['n'];
        $f2->denominator = $preset2['d'];
        $this->expectException(\Exception::class);
        $this->expectExceptionCode(2);
        $this->expectExceptionMessage('divisor must not be null nor zero.');
        $f1->divide($f2);
    }

    public static function provide_divide_can_divide_by_a_fraction_correctly(): array
    {
        return [
            [
                'preset1' => [ 'w' => null, 'n' => 0, 'd' => 1, ],
                'preset2' => [ 'w' => null, 'n' => 1, 'd' => 2, ],
                'expect' => [ 'w' => null, 'n' => 0, 'd' => 1, ],
            ],
            [
                'preset1' => [ 'w' => null, 'n' => 0, 'd' => 1, ],
                'preset2' => [ 'w' => 1, 'n' => 2, 'd' => 1, ],
                'expect' => [ 'w' => null, 'n' => 0, 'd' => 3, ],
            ],
            [
                'preset1' => [ 'w' => 1, 'n' => 1, 'd' => 2, ],
                'preset2' => [ 'w' => 1, 'n' => 2, 'd' => 3, ],
                'expect' => [ 'w' => null, 'n' => 9, 'd' => 10, ],
            ],
            [
                'preset1' => [ 'w' => 2, 'n' => 5, 'd' => 6, ],
                'preset2' => [ 'w' => 3, 'n' => 1, 'd' => 3, ],
                'expect' => [ 'w' => null, 'n' => 17, 'd' => 20, ],
            ],
            [
                'preset1' => [ 'w' => null, 'n' => 9, 'd' => 4, ],
                'preset2' => [ 'w' => null, 'n' => 3, 'd' => 8, ],
                'expect' => [ 'w' => null, 'n' => 6, 'd' => 1, ],
            ],
        ];
    }

    /**
     * @dataProvider provide_divide_can_divide_by_a_fraction_correctly
     */
    public function test_divide_can_divide_by_a_fraction_correctly(array $preset1, array $preset2, array $expect): void
    {
        $f1 = new Fraction();
        $f2 = new Fraction();
        $f1->wholeNumbers = $preset1['w'];
        $f1->numerator = $preset1['n'];
        $f1->denominator = $preset1['d'];
        $f2->wholeNumbers = $preset2['w'];
        $f2->numerator = $preset2['n'];
        $f2->denominator = $preset2['d'];
        $f1->divide($f2);
        $this->assertTrue(
            $f1->wholeNumbers === $expect['w']
            && $f1->numerator === $expect['n']
            && $f1->denominator === $expect['d']
        );
    }

    public static function provide_mixed_can_make_mixed_fraction_correctly(): array
    {
        return [
            ['preset' => ['w' => null, 'n' => -10, 'd' => -10, ], 'expect' => ['w' => null, 'n' => -10, 'd' => -10, ], ],
            ['preset' => ['w' => null, 'n' => -1, 'd' => -1, ], 'expect' => ['w' => null, 'n' => -1, 'd' => -1, ], ],
            ['preset' => ['w' => null, 'n' => 0, 'd' => 0, ], 'expect' => ['w' => null, 'n' => 0, 'd' => 0, ], ],
            ['preset' => ['w' => null, 'n' => 1, 'd' => 1, ], 'expect' => ['w' => 1, 'n' => 0, 'd' => 1, ], ],
            ['preset' => ['w' => null, 'n' => 1, 'd' => 2, ], 'expect' => ['w' => 0, 'n' => 1, 'd' => 2, ], ],
            ['preset' => ['w' => null, 'n' => 2, 'd' => 1, ], 'expect' => ['w' => 2, 'n' => 0, 'd' => 1, ], ],
            ['preset' => ['w' => null, 'n' => 2, 'd' => 2, ], 'expect' => ['w' => 1, 'n' => 0, 'd' => 2, ], ],
            ['preset' => ['w' => null, 'n' => 2, 'd' => 3, ], 'expect' => ['w' => 0, 'n' => 2, 'd' => 3, ], ],
            ['preset' => ['w' => null, 'n' => 2, 'd' => 4, ], 'expect' => ['w' => 0, 'n' => 2, 'd' => 4, ], ],
            ['preset' => ['w' => null, 'n' => 3, 'd' => 1, ], 'expect' => ['w' => 3, 'n' => 0, 'd' => 1, ], ],
            ['preset' => ['w' => null, 'n' => 3, 'd' => 2, ], 'expect' => ['w' => 1, 'n' => 1, 'd' => 2, ], ],
            ['preset' => ['w' => null, 'n' => 3, 'd' => 3, ], 'expect' => ['w' => 1, 'n' => 0, 'd' => 3, ], ],
            ['preset' => ['w' => null, 'n' => 3, 'd' => 4, ], 'expect' => ['w' => 0, 'n' => 3, 'd' => 4, ], ],
            ['preset' => ['w' => null, 'n' => 4, 'd' => 1, ], 'expect' => ['w' => 4, 'n' => 0, 'd' => 1, ], ],
            ['preset' => ['w' => null, 'n' => 4, 'd' => 2, ], 'expect' => ['w' => 2, 'n' => 0, 'd' => 2, ], ],
            ['preset' => ['w' => null, 'n' => 4, 'd' => 3, ], 'expect' => ['w' => 1, 'n' => 1, 'd' => 3, ], ],
            ['preset' => ['w' => null, 'n' => 4, 'd' => 4, ], 'expect' => ['w' => 1, 'n' => 0, 'd' => 4, ], ],
            ['preset' => ['w' => null, 'n' => 4, 'd' => 5, ], 'expect' => ['w' => 0, 'n' => 4, 'd' => 5, ], ],
            ['preset' => ['w' => 1, 'n' => 0, 'd' => 1, ], 'expect' => ['w' => 1, 'n' => 0, 'd' => 1, ], ],
            ['preset' => ['w' => 1, 'n' => 1, 'd' => 1, ], 'expect' => ['w' => 2, 'n' => 0, 'd' => 1, ], ],
            ['preset' => ['w' => 1, 'n' => 1, 'd' => 2, ], 'expect' => ['w' => 1, 'n' => 1, 'd' => 2, ], ],
            ['preset' => ['w' => 1, 'n' => 2, 'd' => 1, ], 'expect' => ['w' => 3, 'n' => 0, 'd' => 1, ], ],
            ['preset' => ['w' => 1, 'n' => 2, 'd' => 2, ], 'expect' => ['w' => 2, 'n' => 0, 'd' => 2, ], ],
            ['preset' => ['w' => 1, 'n' => 2, 'd' => 3, ], 'expect' => ['w' => 1, 'n' => 2, 'd' => 3, ], ],
            ['preset' => ['w' => 1, 'n' => 2, 'd' => 4, ], 'expect' => ['w' => 1, 'n' => 2, 'd' => 4, ], ],
            ['preset' => ['w' => 2, 'n' => 0, 'd' => 1, ], 'expect' => ['w' => 2, 'n' => 0, 'd' => 1, ], ],
            ['preset' => ['w' => 2, 'n' => 1, 'd' => 1, ], 'expect' => ['w' => 3, 'n' => 0, 'd' => 1, ], ],
            ['preset' => ['w' => 2, 'n' => 1, 'd' => 2, ], 'expect' => ['w' => 2, 'n' => 1, 'd' => 2, ], ],
            ['preset' => ['w' => 2, 'n' => 2, 'd' => 1, ], 'expect' => ['w' => 4, 'n' => 0, 'd' => 1, ], ],
            ['preset' => ['w' => 2, 'n' => 2, 'd' => 2, ], 'expect' => ['w' => 3, 'n' => 0, 'd' => 2, ], ],
            ['preset' => ['w' => 2, 'n' => 2, 'd' => 3, ], 'expect' => ['w' => 2, 'n' => 2, 'd' => 3, ], ],
            ['preset' => ['w' => 2, 'n' => 2, 'd' => 4, ], 'expect' => ['w' => 2, 'n' => 2, 'd' => 4, ], ],
        ];
    }

    /**
     * @dataProvider provide_mixed_can_make_mixed_fraction_correctly
     */
    public function test_mixed_can_make_mixed_fraction_correctly(array $preset, array $expect): void
    {
        $f = new Fraction();
        $f->wholeNumbers = $preset['w'];
        $f->numerator = $preset['n'];
        $f->denominator = $preset['d'];
        $f->mixed();
        $this->assertTrue(
            $f->wholeNumbers === $expect['w']
            && $f->numerator === $expect['n']
            && $f->denominator === $expect['d']
        );
    }

    public static function provide_int_can_return_integer_correctly(): array
    {
        return [
            ['w' => null, 'n' => null, 'd' => null, 'expect' => null, ],
            ['w' => 1, 'n' => null, 'd' => null, 'expect' => null, ],
            ['w' => null, 'n' => 1, 'd' => null, 'expect' => null, ],
            ['w' => null, 'n' => null, 'd' => 1, 'expect' => null, ],
            ['w' => 1, 'n' => null, 'd' => 1, 'expect' => null, ],
            ['w' => null, 'n' => 1, 'd' => 1, 'expect' => 1, ],
            ['w' => 1, 'n' => 1, 'd' => null, 'expect' => null, ],
            ['w' => 1, 'n' => 1, 'd' => 1, 'expect' => 2, ],
            ['w' => 1, 'n' => 0, 'd' => 1, 'expect' => 1, ],
            ['w' => null, 'n' => 1, 'd' => 2, 'expect' => 0, ],
            ['w' => null, 'n' => 3, 'd' => 2, 'expect' => 1, ],
            ['w' => -10, 'n' => 1, 'd' => 2, 'expect' => -10, ],
            ['w' => -1, 'n' => 1, 'd' => 2, 'expect' => -1, ],
            ['w' => 0, 'n' => 1, 'd' => 2, 'expect' => 0, ],
            ['w' => 1, 'n' => 2, 'd' => 3, 'expect' => 1, ],
            ['w' => 2, 'n' => 3, 'd' => 4, 'expect' => 2, ],
            ['w' => 3, 'n' => 4, 'd' => 5, 'expect' => 3, ],
            ['w' => -10, 'n' => 5, 'd' => 2, 'expect' => -12, ],
            ['w' => -10, 'n' => -5, 'd' => 2, 'expect' => -8, ],
            ['w' => -1, 'n' => 3, 'd' => 2, 'expect' => -2, ],
            ['w' => -1, 'n' => -3, 'd' => 2, 'expect' => 0, ],
            ['w' => -1, 'n' => -5, 'd' => 2, 'expect' => 1, ],
        ];
    }

    /**
     * @dataProvider provide_int_can_return_integer_correctly
     */
    public function test_int_can_return_integer_correctly(int|null $w, int|null $n, int|null $d, int|null $expect): void
    {
        $f = new Fraction();
        $f->wholeNumbers = $w;
        $f->numerator = $n;
        $f->denominator = $d;
        $this->assertSame($expect, $f->int());
    }

    public static function provide_float_can_return_float_correctly(): array
    {
        return [
            ['w' => null, 'n' => null, 'd' => null, 'expect' => null, ],
            ['w' => null, 'n' => null, 'd' => 0, 'expect' => null, ],
            ['w' => null, 'n' => 0, 'd' => null, 'expect' => null, ],
            ['w' => 0, 'n' => null, 'd' => null, 'expect' => null, ],
            ['w' => null, 'n' => 0, 'd' => 0, 'expect' => null, ],
            ['w' => 0, 'n' => null, 'd' => 0, 'expect' => null, ],
            ['w' => 0, 'n' => 0, 'd' => null, 'expect' => null, ],
            ['w' => 0, 'n' => 0, 'd' => 0, 'expect' => null, ],
            ['w' => 0, 'n' => 1, 'd' => 0, 'expect' => null, ],
            ['w' => 1, 'n' => 0, 'd' => 0, 'expect' => null, ],
            ['w' => 1, 'n' => 1, 'd' => 0, 'expect' => null, ],
            ['w' => 0, 'n' => 0, 'd' => 1, 'expect' => 0.0, ],
            ['w' => 0, 'n' => 1, 'd' => 1, 'expect' => 1.0, ],
            ['w' => 1, 'n' => 0, 'd' => 1, 'expect' => 1.0, ],
            ['w' => 1, 'n' => 1, 'd' => 1, 'expect' => 2.0, ],
            ['w' => 0, 'n' => 1, 'd' => 2, 'expect' => 0.5, ],
            ['w' => 1, 'n' => 1, 'd' => 2, 'expect' => 1.5, ],
            ['w' => 1, 'n' => 2, 'd' => 1, 'expect' => 3.0, ],
            ['w' => 1, 'n' => 2, 'd' => 4, 'expect' => 1.5, ],
            ['w' => 2, 'n' => 0, 'd' => 1, 'expect' => 2.0, ],
            ['w' => 2, 'n' => 1, 'd' => 2, 'expect' => 2.5, ],
            ['w' => 2, 'n' => 1, 'd' => 4, 'expect' => 2.25, ],
            ['w' => 2, 'n' => 2, 'd' => 1, 'expect' => 4.0, ],
            ['w' => 2, 'n' => 2, 'd' => 4, 'expect' => 2.5, ],
        ];
    }

    /**
     * @dataProvider provide_float_can_return_float_correctly
     */
    public function test_float_can_return_float_correctly(int|null $w, int|null $n, int|null $d, float|null $expect): void
    {
        $f = new Fraction();
        $f->wholeNumbers = $w;
        $f->numerator = $n;
        $f->denominator = $d;
        $this->assertSame($expect, $f->float());
    }

    public static function provide_text_can_return_text_correctly(): array
    {
        return [
            ['w' => null, 'n' => null, 'd' => null, 'expect' => null, ],
            ['w' => null, 'n' => null, 'd' => 1, 'expect' => null, ],
            ['w' => null, 'n' => 1, 'd' => null, 'expect' => null, ],
            ['w' => 1, 'n' => null, 'd' => null, 'expect' => null, ],
            ['w' => 1, 'n' => 1, 'd' => null, 'expect' => null, ],
            ['w' => 1, 'n' => null, 'd' => 1, 'expect' => null, ],
            ['w' => null, 'n' => 1, 'd' => 1, 'expect' => '1/1', ],
            ['w' => null, 'n' => 1, 'd' => 2, 'expect' => '1/2', ],
            ['w' => 1, 'n' => 2, 'd' => 3, 'expect' => '1 2/3', ],
            ['w' => 1, 'n' => 2, 'd' => 0, 'expect' => '1 2/0', ],
        ];
    }

    /**
     * @dataProvider provide_text_can_return_text_correctly
     */
    public function test_text_can_return_text_correctly(int|null $w, int|null $n, int|null $d, string|null $expect): void
    {
        $f = new Fraction();
        $f->wholeNumbers = $w;
        $f->numerator = $n;
        $f->denominator = $d;
        $this->assertSame($expect, $f->text());
    }
}
