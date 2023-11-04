<?php

declare(strict_types=1);

namespace Macocci7\PhpMathInteger;

require_once('vendor/autoload.php');
require_once('src/Number.php');
require_once('src/Prime.php');
require_once('src/Divisor.php');
require_once('src/Euclid.php');
require_once('src/Multiple.php');
require_once('src/Fraction.php');

use PHPUnit\Framework\TestCase;
use Macocci7\PhpMathInteger\Fraction;

final class FractionTest extends TestCase
{
    public function test_isReduced_can_judge_correctly(): void
    {
        $cases = [
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
        $f = new Fraction();
        foreach ($cases as $case) {
            $f->wholeNumbers = $case['w'];
            $f->numerator = $case['n'];
            $f->denominator = $case['d'];
            $this->assertSame($case['expect'], $f->isReduced());
        }
    }

    public function test_isProper_can_judge_correctly(): void
    {
        $cases = [
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
        $f = new Fraction();
        foreach ($cases as $case) {
            $f->wholeNumbers = $case['w'];
            $f->numerator = $case['n'];
            $f->denominator = $case['d'];
            $this->assertSame($case['expect'], $f->isProper());
        }
    }

    public function test_isImproper_can_judge_correctly(): void
    {
        $cases = [
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
        $f = new Fraction();
        foreach ($cases as $case) {
            $f->wholeNumbers = $case['w'];
            $f->numerator = $case['n'];
            $f->denominator = $case['d'];
            $this->assertSame($case['expect'], $f->isImproper());
        }
    }

    public function test_isMixed_can_judge_correctly(): void
    {
        $cases = [
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
        $f = new Fraction();
        foreach ($cases as $case) {
            $f->wholeNumbers = $case['w'];
            $f->numerator = $case['n'];
            $f->denominator = $case['d'];
            $this->assertSame($case['expect'], $f->isMixed());
        }
    }

    public function test_reduce_can_reduce_fraction_correctly(): void
    {
        $cases = [
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
        $f = new Fraction();
        foreach ($cases as $case) {
            $f->wholeNumbers = $case['preset']['w'];
            $f->numerator = $case['preset']['n'];
            $f->denominator = $case['preset']['d'];
            $f->reduce();
            $this->assertTrue(
                $f->wholeNumbers === $case['expect']['w']
                && $f->numerator === $case['expect']['n']
                && $f->denominator === $case['expect']['d']
            );
        }
    }

    public function test_add_can_throw_exception_with_invalid_preset(): void
    {
        $cases = [
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
        $f1 = new Fraction();
        $f2 = new Fraction();
        foreach ($cases as $case) {
            $f1->wholeNumbers = $case['preset1']['w'];
            $f1->numerator = $case['preset1']['n'];
            $f1->denominator = $case['preset1']['d'];
            $f2->wholeNumbers = $case['preset2']['w'];
            $f2->numerator = $case['preset2']['n'];
            $f2->denominator = $case['preset2']['d'];
            $this->expectException(\Exception::class);
            $this->expectExceptionCode(1);
            $this->expectExceptionMessage('denominator must not be null nor zero.');
            $f1->add($f2);
        }
    }

    public function test_add_can_add_a_fraction_correctly(): void
    {
        $cases = [
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
        $f1 = new Fraction();
        $f2 = new Fraction();
        foreach ($cases as $case) {
            $f1->wholeNumbers = $case['preset1']['w'];
            $f1->numerator = $case['preset1']['n'];
            $f1->denominator = $case['preset1']['d'];
            $f2->wholeNumbers = $case['preset2']['w'];
            $f2->numerator = $case['preset2']['n'];
            $f2->denominator = $case['preset2']['d'];
            $f1->add($f2);
            $this->assertTrue(
                $f1->wholeNumbers === $case['expect']['w']
                && $f1->numerator === $case['expect']['n']
                && $f1->denominator === $case['expect']['d']
            );
        }
    }

    public function test_substruct_can_throw_exception_with_invalid_preset(): void
    {
        $cases = [
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
        $f1 = new Fraction();
        $f2 = new Fraction();
        foreach ($cases as $case) {
            $f1->wholeNumbers = $case['preset1']['w'];
            $f1->numerator = $case['preset1']['n'];
            $f1->denominator = $case['preset1']['d'];
            $f2->wholeNumbers = $case['preset2']['w'];
            $f2->numerator = $case['preset2']['n'];
            $f2->denominator = $case['preset2']['d'];
            $this->expectException(\Exception::class);
            $this->expectExceptionCode(1);
            $this->expectExceptionMessage('denominator must not be null nor zero.');
            $f1->substruct($f2);
        }
    }

    public function test_substruct_can_substruct_a_fraction_correctly(): void
    {
        $cases = [
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
        $f1 = new Fraction();
        $f2 = new Fraction();
        foreach ($cases as $case) {
            $f1->wholeNumbers = $case['preset1']['w'];
            $f1->numerator = $case['preset1']['n'];
            $f1->denominator = $case['preset1']['d'];
            $f2->wholeNumbers = $case['preset2']['w'];
            $f2->numerator = $case['preset2']['n'];
            $f2->denominator = $case['preset2']['d'];
            $f1->substruct($f2);
            $this->assertTrue(
                $f1->wholeNumbers === $case['expect']['w']
                && $f1->numerator === $case['expect']['n']
                && $f1->denominator === $case['expect']['d']
            );
        }
    }

    public function test_multiply_can_throw_exception_with_invalid_preset(): void
    {
        $cases = [
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
        $f1 = new Fraction();
        $f2 = new Fraction();
        foreach ($cases as $case) {
            $f1->wholeNumbers = $case['preset1']['w'];
            $f1->numerator = $case['preset1']['n'];
            $f1->denominator = $case['preset1']['d'];
            $f2->wholeNumbers = $case['preset2']['w'];
            $f2->numerator = $case['preset2']['n'];
            $f2->denominator = $case['preset2']['d'];
            $this->expectException(\Exception::class);
            $this->expectExceptionCode(1);
            $this->expectExceptionMessage('denominator must not be null nor zero.');
            $f1->multiply($f2);
        }
    }

    public function test_multiply_can_multiply_by_a_fraction_correctly(): void
    {
        $cases = [
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
        $f1 = new Fraction();
        $f2 = new Fraction();
        foreach ($cases as $case) {
            $f1->wholeNumbers = $case['preset1']['w'];
            $f1->numerator = $case['preset1']['n'];
            $f1->denominator = $case['preset1']['d'];
            $f2->wholeNumbers = $case['preset2']['w'];
            $f2->numerator = $case['preset2']['n'];
            $f2->denominator = $case['preset2']['d'];
            $f1->multiply($f2);
            $this->assertTrue(
                $f1->wholeNumbers === $case['expect']['w']
                && $f1->numerator === $case['expect']['n']
                && $f1->denominator === $case['expect']['d']
            );
        }
    }

    public function test_divide_can_throw_exception_with_invalid_denominator(): void
    {
        $cases = [
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
        $f1 = new Fraction();
        $f2 = new Fraction();
        foreach ($cases as $case) {
            $f1->wholeNumbers = $case['preset1']['w'];
            $f1->numerator = $case['preset1']['n'];
            $f1->denominator = $case['preset1']['d'];
            $f2->wholeNumbers = $case['preset2']['w'];
            $f2->numerator = $case['preset2']['n'];
            $f2->denominator = $case['preset2']['d'];
            $this->expectException(\Exception::class);
            $this->expectExceptionCode(1);
            $this->expectExceptionMessage('denominator must not be null nor zero.');
            $f1->divide($f2);
        }
    }

    public function test_divide_can_throw_exception_with_invalid_divisor(): void
    {
        $cases = [
            [
                'preset1' => [ 'w' => 2, 'n' => 1, 'd' => 1, ],
                'preset2' => [ 'w' => 2, 'n' => 0, 'd' => 1, ],
            ],
        ];
        $f1 = new Fraction();
        $f2 = new Fraction();
        foreach ($cases as $case) {
            $f1->wholeNumbers = $case['preset1']['w'];
            $f1->numerator = $case['preset1']['n'];
            $f1->denominator = $case['preset1']['d'];
            $f2->wholeNumbers = $case['preset2']['w'];
            $f2->numerator = $case['preset2']['n'];
            $f2->denominator = $case['preset2']['d'];
            $this->expectException(\Exception::class);
            $this->expectExceptionCode(2);
            $this->expectExceptionMessage('divisor must not be null nor zero.');
            $f1->divide($f2);
        }
    }

    public function test_divide_can_divide_by_a_fraction_correctly(): void
    {
        $cases = [
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
        $f1 = new Fraction();
        $f2 = new Fraction();
        foreach ($cases as $case) {
            $f1->wholeNumbers = $case['preset1']['w'];
            $f1->numerator = $case['preset1']['n'];
            $f1->denominator = $case['preset1']['d'];
            $f2->wholeNumbers = $case['preset2']['w'];
            $f2->numerator = $case['preset2']['n'];
            $f2->denominator = $case['preset2']['d'];
            $f1->divide($f2);
            $this->assertTrue(
                $f1->wholeNumbers === $case['expect']['w']
                && $f1->numerator === $case['expect']['n']
                && $f1->denominator === $case['expect']['d']
            );
        }
    }

    public function test_mixed_can_make_mixed_fraction_correctly(): void
    {
        $cases = [
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
        $f = new Fraction();
        foreach ($cases as $case) {
            $f->wholeNumbers = $case['preset']['w'];
            $f->numerator = $case['preset']['n'];
            $f->denominator = $case['preset']['d'];
            $f->mixed();
            $this->assertTrue(
                $f->wholeNumbers === $case['expect']['w']
                && $f->numerator === $case['expect']['n']
                && $f->denominator === $case['expect']['d']
            );
        }
    }

    public function test_int_can_return_integer_correctly(): void
    {
        $cases = [
            ['w' => null, 'expect' => 0, ],
            ['w' => -10, 'expect' => -10, ],
            ['w' => -1, 'expect' => -1, ],
            ['w' => 0, 'expect' => 0, ],
            ['w' => 1, 'expect' => 1, ],
            ['w' => 2, 'expect' => 2, ],
            ['w' => 3, 'expect' => 3, ],
        ];
        $f = new Fraction();
        foreach ($cases as $case) {
            $f->wholeNumbers = $case['w'];
            $this->assertSame($case['expect'], $f->int());
        }
    }

    public function test_float_can_return_float_correctly(): void
    {
        $cases = [
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
        $f = new Fraction();
        foreach ($cases as $case) {
            $f->wholeNumbers = $case['w'];
            $f->numerator = $case['n'];
            $f->denominator = $case['d'];
            $this->assertSame($case['expect'], $f->float());
        }
    }
}
