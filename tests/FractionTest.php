<?php

declare(strict_types=1);

namespace Macocci7\PhpMathInteger;

require_once('vendor/autoload.php');
require_once('src/Number.php');
require_once('src/Prime.php');
require_once('src/Divisor.php');
require_once('src/Euclid.php');
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
}
