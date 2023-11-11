<?php

declare(strict_types=1);

namespace Macocci7\PhpMathInteger;

require_once('vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Macocci7\PhpMathInteger\Bezout;

final class BezoutTest extends TestCase
{
    public function test_set_can_set_coefficients_correctly(): void
    {
        $cases = [
            ['param' => [], 'expect' => [null, null, null, ], ],
            ['param' => [1], 'expect' => [null, null, null, ], ],
            ['param' => [1, 2, ], 'expect' => [null, null, null, ], ],
            ['param' => [1, 2, 3, ], 'expect' => [1, 2, 3, ], ],
            ['param' => [1, 2, 3, 4, ], 'expect' => [null, null, null, ], ],
            ['param' => [1, 2.5, 3, ], 'expect' => [null, null, null, ], ],
            ['param' => [0, 1, 2, ], 'expect' => [null, null, null, ], ],
            ['param' => [1, 0, 2, ], 'expect' => [null, null, null, ], ],
            ['param' => [0, 0, 2, ], 'expect' => [null, null, null, ], ],
            ['param' => [1, 2, 0, ], 'expect' => [1, 2, 0, ], ],
        ];
        foreach ($cases as $case) {
            $b = new Bezout();
            $b->set($case['param']);
            $this->assertTrue(
                $b->a === $case['expect'][0]
                && $b->b === $case['expect'][1]
                && $b->c === $case['expect'][2]
            );
        }
    }

    public function test_clear_can_clear_coeffecients_correctly(): void
    {
        $cases = [
            ['preset' => [1, 2, 3], 'expect' => [null, null, null, ], ],
        ];
        foreach ($cases as $case) {
            $b = new Bezout($case['preset']);
            $b->clear();
            $this->assertTrue(
                $b->a === $case['expect'][0]
                && $b->b === $case['expect'][1]
                && $b->c === $case['expect'][2]
            );
        }
    }

    public function test_equation_can_return_equation_correctly(): void
    {
        $cases = [
            ['preset' => [], 'expect' => null, ],
            ['preset' => [1], 'expect' => null, ],
            ['preset' => [1, 2, ], 'expect' => null, ],
            ['preset' => [0, 1, 2, ], 'expect' => null, ],
            ['preset' => [1, 0, 2, ], 'expect' => null, ],
            ['preset' => [1, 2, 0, ], 'expect' => 'x + 2y = 0', ],
            ['preset' => [1, 1, 2, ], 'expect' => 'x + y = 2', ],
            ['preset' => [-1, -1, -2, ], 'expect' => '-x - y = -2', ],
            ['preset' => [3, 4, 1, ], 'expect' => '3x + 4y = 1', ],
            ['preset' => [-3, -4, -1, ], 'expect' => '-3x - 4y = -1', ],
        ];
        foreach ($cases as $case) {
            $b = new Bezout($case['preset']);
            $this->assertSame($case['expect'], $b->equation());
        }
    }

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
