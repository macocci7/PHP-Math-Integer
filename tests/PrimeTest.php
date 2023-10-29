<?php

declare(strict_types=1);

namespace Macocci7\PhpMathInteger;

require_once('vendor/autoload.php');
require_once('src/Number.php');
require_once('src/Prime.php');

use PHPUnit\Framework\TestCase;
use Macocci7\PhpMathInteger\Prime;

final class PrimeTest extends TestCase
{
    public function test_isPrime_can_judge_correctly(): void
    {
        $cases = [
            ['param' => -1, 'expect' => false, ],
            ['param' => 0, 'expect' => false, ],
            ['param' => 1, 'expect' => false, ],
            ['param' => 2, 'expect' => true, ],
            ['param' => 3, 'expect' => true, ],
            ['param' => 4, 'expect' => false, ],
            ['param' => 5, 'expect' => true, ],
            ['param' => 6, 'expect' => false, ],
            ['param' => 7, 'expect' => true, ],
            ['param' => 8, 'expect' => false, ],
            ['param' => 9, 'expect' => false, ],
            ['param' => 10, 'expect' => false, ],
            ['param' => 11, 'expect' => true, ],
        ];
        $p = new Prime();
        foreach ($cases as $case) {
            $this->assertSame($p->isPrime($case['param']), $case['expect']);
        }
    }

    public function test_isPrimeAll_can_judge_correctly(): void
    {
        $cases = [
            ['param' => [], 'expect' => false, ],
            ['param' => [0], 'expect' => false, ],
            ['param' => [-1], 'expect' => false, ],
            ['param' => [-2], 'expect' => false, ],
            ['param' => [1], 'expect' => false, ],
            ['param' => [2], 'expect' => true, ],
            ['param' => [3], 'expect' => true, ],
            ['param' => [4], 'expect' => false, ],
            ['param' => [5], 'expect' => true, ],
            ['param' => [6], 'expect' => false, ],
            ['param' => [7], 'expect' => true, ],
            ['param' => [2,3,5,7,11,13,17,19], 'expect' => true, ],
            ['param' => [2,3,5,7,11,13,17,19,20], 'expect' => false, ],
        ];
        $p = new Prime();
        foreach ($cases as $case) {
            $this->assertSame($case['expect'], $p->isPrimeAll($case['param']));
        }
    }

    public function test_next_can_return_next_prime_correctly(): void
    {
        $cases = [
            ['param' => -1, 'expect' => 2,],
            ['param' => 0, 'expect' => 2,],
            ['param' => 1, 'expect' => 2,],
            ['param' => 2, 'expect' => 3,],
            ['param' => 3, 'expect' => 5,],
            ['param' => 4, 'expect' => 5,],
            ['param' => 5, 'expect' => 7,],
            ['param' => 6, 'expect' => 7,],
        ];
        $p = new Prime();
        foreach ($cases as $case) {
            $this->assertSame($p->next($case['param']), $case['expect']);
        }
    }

    public function test_between_can_return_primes_correctly(): void
    {
        $cases = [
            ['a' => -10, 'b' => -2, 'expect' => [], ],
            ['a' => 1, 'b' => 1, 'expect' => [], ],
            ['a' => 1, 'b' => 2, 'expect' => [2, ], ],
            ['a' => 1, 'b' => 3, 'expect' => [2, 3, ], ],
            ['a' => 1, 'b' => 4, 'expect' => [2, 3, ], ],
            ['a' => 1, 'b' => 5, 'expect' => [2, 3, 5, ], ],
            ['a' => 3, 'b' => 11, 'expect' => [3, 5, 7, 11, ], ],
            ['a' => 4, 'b' => 11, 'expect' => [5, 7, 11, ], ],
            ['a' => 4, 'b' => 12, 'expect' => [5, 7, 11, ], ],
            ['a' => -4, 'b' => 12, 'expect' => [2, 3, 5, 7, 11, ], ],
        ];
        $p = new Prime();
        foreach ($cases as $case) {
            $this->assertSame($p->between($case['a'], $case['b']), $case['expect']);
        }
    }

    public function test_factorize_can_factorize_correctly(): void
    {
        $cases = [
            ['param' => -10, 'expect' => null, ],
            ['param' => -1, 'expect' => null, ],
            ['param' => 0, 'expect' => null, ],
            ['param' => 1, 'expect' => [ 0 => [null, 1], ], ],
            ['param' => 2, 'expect' => [ 0 => [null, 2], ], ],
            ['param' => 3, 'expect' => [ 0 => [null, 3], ], ],
            ['param' => 4, 'expect' => [ 0 => [2, 4], 1 => [null, 2], ], ],
            ['param' => 5, 'expect' => [ 0 => [null, 5], ], ],
            ['param' => 6, 'expect' => [ 0 => [2, 6], 1 => [null, 3], ], ],
            ['param' => 7, 'expect' => [ 0 => [null, 7], ], ],
            ['param' => 8, 'expect' => [ 0 => [2, 8], 1 => [2, 4], 2 => [null, 2], ], ],
            ['param' => 9, 'expect' => [ 0 => [3, 9], 1 => [null, 3], ], ],
            ['param' => 10, 'expect' => [ 0 => [2, 10], 1 => [null, 5], ], ],
            ['param' => 11, 'expect' => [ 0 => [null, 11], ], ],
            ['param' => 12, 'expect' => [ 0 => [2, 12], 1 => [2, 6], 2 => [null, 3], ], ],
        ];
        $p = new Prime();
        foreach ($cases as $case) {
            $this->assertSame($p->factorize($case['param']), $case['expect']);
        }
    }

    public function test_factors_can_return_factors_correctly(): void
    {
        $cases = [
            ['param' => -10, 'expect' => null, ],
            ['param' => -1, 'expect' => null, ],
            ['param' => 0, 'expect' => null, ],
            ['param' => 1, 'expect' => [1], ],
            ['param' => 2, 'expect' => [2], ],
            ['param' => 3, 'expect' => [3], ],
            ['param' => 4, 'expect' => [2, 2, ], ],
            ['param' => 5, 'expect' => [5], ],
            ['param' => 6, 'expect' => [2, 3, ], ],
            ['param' => 7, 'expect' => [7], ],
            ['param' => 8, 'expect' => [2, 2, 2, ], ],
            ['param' => 9, 'expect' => [3, 3, ], ],
            ['param' => 10, 'expect' => [2, 5, ], ],
            ['param' => 11, 'expect' => [11], ],
            ['param' => 12, 'expect' => [2, 2, 3, ], ],
        ];
        $p = new Prime();
        foreach ($cases as $case) {
            $this->assertSame($p->factors($case['param']), $case['expect']);
        }
    }

    public function test_countSameElements_can_return_result_correctly(): void
    {
        $cases = [
            ['param' => [], 'expect' => [], ],
            ['param' => [1], 'expect' => null, ],
            ['param' => [2, 3, ], 'expect' => [2 => 1, 3 => 1, ], ],
            ['param' => [2, 2, 3, ], 'expect' => [2 => 2, 3 => 1, ], ],
            ['param' => [2, 2, 2, 3, 3, 5, ], 'expect' => [2 => 3, 3 => 2, 5 => 1, ], ],
        ];
        $p = new Prime();
        foreach ($cases as $case) {
            $this->assertSame($p->countSameElements($case['param']), $case['expect']);
        }
    }

    public function test_factorizedFormula_can_return_formula_correctly(): void
    {
        $cases = [
            ['param' => -10, 'expect' => null, ],
            ['param' => -1, 'expect' => null, ],
            ['param' => 0, 'expect' => null, ],
            ['param' => 1, 'expect' => null, ],
            ['param' => 2, 'expect' => ['factors' => [['base' => 2, 'exp' => 1, ]], 'formula' => '2', ], ],
            ['param' => 3, 'expect' => ['factors' => [['base' => 3, 'exp' => 1, ]], 'formula' => '3', ], ],
            ['param' => 4, 'expect' => ['factors' => [['base' => 2, 'exp' => 2, ]], 'formula' => '2 ^ 2', ], ],
            ['param' => 5, 'expect' => ['factors' => [['base' => 5, 'exp' => 1, ]], 'formula' => '5', ], ],
            ['param' => 6, 'expect' => ['factors' => [['base' => 2, 'exp' => 1, ], ['base' => 3, 'exp' => 1, ], ], 'formula' => '2 * 3', ], ],
            ['param' => 7, 'expect' => ['factors' => [['base' => 7, 'exp' => 1, ]], 'formula' => '7', ], ],
            ['param' => 8, 'expect' => ['factors' => [['base' => 2, 'exp' => 3, ]], 'formula' => '2 ^ 3', ], ],
            ['param' => 9, 'expect' => ['factors' => [['base' => 3, 'exp' => 2, ]], 'formula' => '3 ^ 2', ], ],
            ['param' => 10, 'expect' => ['factors' => [['base' => 2, 'exp' => 1, ], ['base' => 5, 'exp' => 1, ], ], 'formula' => '2 * 5', ], ],
            ['param' => 11, 'expect' => ['factors' => [['base' => 11, 'exp' => 1, ]], 'formula' => '11', ], ],
            ['param' => 12, 'expect' => ['factors' => [['base' => 2, 'exp' => 2, ], ['base' => 3, 'exp' => 1, ], ], 'formula' => '2 ^ 2 * 3', ], ],
            ['param' => 36, 'expect' => ['factors' => [['base' => 2, 'exp' => 2, ], ['base' => 3, 'exp' => 2, ], ], 'formula' => '2 ^ 2 * 3 ^ 2', ], ],
            ['param' => 72, 'expect' => ['factors' => [['base' => 2, 'exp' => 3, ], ['base' => 3, 'exp' => 2, ], ], 'formula' => '2 ^ 3 * 3 ^ 2', ], ],
        ];
        $p = new Prime();
        foreach ($cases as $case) {
            $this->assertSame($case['expect'], $p->factorizedFormula($case['param']));
        }
    }
}
