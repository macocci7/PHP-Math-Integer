<?php

declare(strict_types=1);

namespace Macocci7\PhpMathInteger;

require_once('vendor/autoload.php');
require_once('src/Number.php');
require_once('src/Prime.php');
require_once('src/Divisor.php');
require_once('src/Euclid.php');
require_once('src/Bezout.php');

use PHPUnit\Framework\TestCase;
use Macocci7\PhpMathInteger\Bezout;

final class BezoutTest extends TestCase
{
    public function test_isSolvable_can_judge_correctly(): void
    {
        $cases = [
            ['a' => null, 'b' => null, 'c' => null, 'expect' => false, ],
            ['a' => 0, 'b' => 0, 'c' => 0, 'expect' => false, ],
            ['a' => 1, 'b' => 1, 'c' => 1, 'expect' => false, ],
            ['a' => 1, 'b' => 2, 'c' => 3, 'expect' => true, ],
            ['a' => 2, 'b' => 2, 'c' => 1, 'expect' => false, ],
            ['a' => 2, 'b' => 2, 'c' => 2, 'expect' => false, ],
            ['a' => 2, 'b' => 3, 'c' => 1, 'expect' => true, ],
            ['a' => -2, 'b' => 3, 'c' => 1, 'expect' => true, ],
            ['a' => 2, 'b' => -3, 'c' => 1, 'expect' => true, ],
            ['a' => 2, 'b' => 3, 'c' => -1, 'expect' => true, ],
            ['a' => 3, 'b' => 4, 'c' => 1, 'expect' => true, ],
            ['a' => -3, 'b' => -4, 'c' => -1, 'expect' => true, ],
            ['a' => 4, 'b' => 6, 'c' => 1, 'expect' => false, ],
            ['a' => 4, 'b' => 9, 'c' => 1, 'expect' => true, ],
            ['a' => 8, 'b' => 18, 'c' => 1, 'expect' => false, ],
            ['a' => 8, 'b' => 18, 'c' => 2, 'expect' => true, ],
        ];
        $b = new Bezout();
        foreach ($cases as $case) {
            $b->a = $case['a'];
            $b->b = $case['b'];
            $b->c = $case['c'];
            $this->assertSame($case['expect'], $b->isSolvable());
        }
    }

    public function test_solution_can_return_a_solution_set_correctly(): void
    {
        $cases = [
            ['preset' => ['a' => 3, 'b' => 4, 'c' => 1, ], 'expect' => ['x' => -1, 'y' => 1, ], ],
            ['preset' => ['a' => 3, 'b' => 4, 'c' => -1, ], 'expect' => ['x' => 1, 'y' => -1, ], ],
            ['preset' => ['a' => 3, 'b' => -4, 'c' => 1, ], 'expect' => ['x' => -1, 'y' => -1, ], ],
            ['preset' => ['a' => -3, 'b' => 4, 'c' => 1, ], 'expect' => ['x' => 1, 'y' => 1, ], ],
            ['preset' => ['a' => 3, 'b' => 4, 'c' => 2, ], 'expect' => ['x' => -2, 'y' => 2, ], ],
        ];
        $b = new Bezout();
        foreach ($cases as $case) {
            $b->a = $case['preset']['a'];
            $b->b = $case['preset']['b'];
            $b->c = $case['preset']['c'];
            $s = $b->solution();
            $this->assertTrue(
                $s['solution']['x'] === $case['expect']['x']
                && $s['solution']['y'] === $case['expect']['y']
            );
        }
    }

    public function test_generalSolution_can_return_general_solution_correctly(): void
    {
        $cases = [
            [
                'preset' => [ 'a' => 2, 'b' => 3, 'c' => 1, ],
                'expect' => [
                    'x' => [ 'a' => 3, 'b' => -1, ],
                    'y' => [ 'a' => 2, 'b' => 1, ],
                ],
            ],
            [
                'preset' => [ 'a' => 3, 'b' => 4, 'c' => 1, ],
                'expect' => [
                    'x' => [ 'a' => 4, 'b' => -1, ],
                    'y' => [ 'a' => 3, 'b' => 1, ],
                ],
            ],
            [
                'preset' => [ 'a' => 4, 'b' => 3, 'c' => 1, ],
                'expect' => [
                    'x' => [ 'a' => 3, 'b' => 1, ],
                    'y' => [ 'a' => 4, 'b' => -1, ],
                ],
            ],
            [
                'preset' => [ 'a' => 6, 'b' => 8, 'c' => 2, ],
                'expect' => [
                    'x' => [ 'a' => 8, 'b' => -1, ],
                    'y' => [ 'a' => 6, 'b' => 1, ],
                ],
            ],
        ];
        $b = new Bezout();
        foreach ($cases as $case) {
            $b->a = $case['preset']['a'];
            $b->b = $case['preset']['b'];
            $b->c = $case['preset']['c'];
            $r = $b->generalSolution();
            $this->assertTrue(
                $r['generalSolution']['x']['a'] = $case['expect']['x']['a']
                && $r['generalSolution']['x']['b'] = $case['expect']['x']['b']
                && $r['generalSolution']['y']['a'] = $case['expect']['y']['a']
                && $r['generalSolution']['y']['b'] = $case['expect']['y']['b']
            );
        }
    }
}
