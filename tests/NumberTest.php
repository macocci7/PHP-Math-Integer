<?php

declare(strict_types=1);

namespace Macocci7\PhpMathInteger;

require('vendor/autoload.php');
require('src/Number.php');

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
}
