<?php

declare(strict_types=1);

namespace Macocci7\PhpMathInteger;

require_once('vendor/autoload.php');
require_once('src/Number.php');
require_once('src/Prime.php');
require_once('src/Divisor.php');

use PHPUnit\Framework\TestCase;
use Macocci7\PhpMathInteger\Divisor;

final class DivisorTest extends TestCase
{
    public function test_count_can_count_correctly(): void
    {
        $cases = [
            ['param' => -10, 'expect' => null, ],
            ['param' => -1, 'expect' => null, ],
            ['param' => 0, 'expect' => null, ],
            ['param' => 1, 'expect' => 1, ],
            ['param' => 2, 'expect' => 2, ],
            ['param' => 3, 'expect' => 2, ],
            ['param' => 4, 'expect' => 3, ],
            ['param' => 5, 'expect' => 2, ],
            ['param' => 6, 'expect' => 4, ],
            ['param' => 7, 'expect' => 2, ],
            ['param' => 8, 'expect' => 4, ],
            ['param' => 9, 'expect' => 3, ],
            ['param' => 10, 'expect' => 4, ],
            ['param' => 11, 'expect' => 2, ],
            ['param' => 12, 'expect' => 6, ],
            ['param' => 24, 'expect' => 8, ],
            ['param' => 36, 'expect' => 9, ],
            ['param' => 72, 'expect' => 12, ],
        ];
        $d = new Divisor();
        foreach ($cases as $case) {
            $this->assertSame($case['expect'], $d->count($case['param']));
        }
    }

    public function test_list_can_list_divisors_correctly(): void
    {
        $cases = [
            ['param' => -10, 'expect' => null, ],
            ['param' => -1, 'expect' => null, ],
            ['param' => 0, 'expect' => null, ],
            ['param' => 1, 'expect' => [1], ],
            ['param' => 2, 'expect' => [1, 2, ], ],
            ['param' => 3, 'expect' => [1, 3, ], ],
            ['param' => 4, 'expect' => [1, 2, 4, ], ],
            ['param' => 5, 'expect' => [1, 5, ], ],
            ['param' => 6, 'expect' => [1, 2, 3, 6, ], ],
            ['param' => 7, 'expect' => [1, 7, ], ],
            ['param' => 8, 'expect' => [1, 2, 4, 8, ], ],
            ['param' => 9, 'expect' => [1, 3, 9, ], ],
            ['param' => 10, 'expect' => [1, 2, 5, 10, ], ],
            ['param' => 11, 'expect' => [1, 11, ], ],
            ['param' => 12, 'expect' => [1, 2, 3, 4, 6, 12, ], ],
        ];
        $d = new Divisor();
        foreach ($cases as $case) {
            $this->assertSame($case['expect'], $d->list($case['param']));
        }
    }

    public function test_commonFactors_can_return_common_factors_correctly(): void
    {
        $cases = [
            ['n1' => -10, 'n2' => -10, 'expect' => null, ],
            ['n1' => -1, 'n2' => -1, 'expect' => null, ],
            ['n1' => 0, 'n2' => 0, 'expect' => null, ],
            ['n1' => 1, 'n2' => 1, 'expect' => null, ],
            ['n1' => 2, 'n2' => 1, 'expect' => null, ],
            ['n1' => 1, 'n2' => 2, 'expect' => null, ],
            ['n1' => 2, 'n2' => 2, 'expect' => [2 => 1], ],
            ['n1' => 2, 'n2' => 3, 'expect' => [], ],
            ['n1' => 8, 'n2' => 12, 'expect' => [2 => 2], ],
            ['n1' => 72, 'n2' => 108, 'expect' => [2 => 2, 3 => 2, ], ],
        ];
        $d = new Divisor();
        foreach ($cases as $case) {
            $this->assertSame($case['expect'], $d->commonFactors($case['n1'], $case['n2']));
        }
    }

    public function test_greatestCommonFactor_can_return_great_common_factor_correctly(): void
    {
        $cases = [
            ['n1' => -10, 'n2' => -10, 'expect' => null, ],
            ['n1' => -1, 'n2' => -1, 'expect' => null, ],
            ['n1' => 0, 'n2' => 0, 'expect' => null, ],
            ['n1' => 1, 'n2' => 0, 'expect' => null, ],
            ['n1' => 0, 'n2' => 1, 'expect' => null, ],
            ['n1' => 1, 'n2' => 1, 'expect' => null, ],
            ['n1' => 2, 'n2' => 1, 'expect' => null, ],
            ['n1' => 1, 'n2' => 2, 'expect' => null, ],
            ['n1' => 2, 'n2' => 2, 'expect' => 2, ],
            ['n1' => 2, 'n2' => 3, 'expect' => 1, ],
            ['n1' => 2, 'n2' => 4, 'expect' => 2, ],
            ['n1' => 3, 'n2' => 4, 'expect' => 1, ],
            ['n1' => 4, 'n2' => 5, 'expect' => 1, ],
            ['n1' => 4, 'n2' => 6, 'expect' => 2, ],
            ['n1' => 4, 'n2' => 8, 'expect' => 4, ],
            ['n1' => 6, 'n2' => 9, 'expect' => 3, ],
            ['n1' => 6, 'n2' => 10, 'expect' => 2, ],
            ['n1' => 6, 'n2' => 12, 'expect' => 6, ],
            ['n1' => 8, 'n2' => 12, 'expect' => 4, ],
            ['n1' => 10, 'n2' => 15, 'expect' => 5, ],
            ['n1' => 12, 'n2' => 18, 'expect' => 6, ],
        ];
        $d = new Divisor();
        foreach ($cases as $case) {
            $this->assertSame($case['expect'], $d->greatestCommonFactor($case['n1'], $case['n2']));
        }
    }

    public function test_commonDivisors_can_list_common_divisors_correctly(): void
    {
        $cases = [
            ['n1' => -10, 'n2' => -10, 'expect' => null, ],
            ['n1' => -1, 'n2' => -1, 'expect' => null, ],
            ['n1' => 0, 'n2' => 0, 'expect' => null, ],
            ['n1' => 1, 'n2' => 1, 'expect' => null, ],
            ['n1' => 2, 'n2' => 1, 'expect' => null, ],
            ['n1' => 1, 'n2' => 2, 'expect' => null, ],
            ['n1' => 2, 'n2' => 2, 'expect' => [1, 2, ], ],
            ['n1' => 2, 'n2' => 3, 'expect' => [1, ], ],
            ['n1' => 2, 'n2' => 4, 'expect' => [1, 2, ], ],
            ['n1' => 3, 'n2' => 4, 'expect' => [1, ], ],
            ['n1' => 3, 'n2' => 6, 'expect' => [1, 3, ], ],
            ['n1' => 4, 'n2' => 5, 'expect' => [1, ], ],
            ['n1' => 4, 'n2' => 6, 'expect' => [1, 2, ], ],
            ['n1' => 4, 'n2' => 8, 'expect' => [1, 2, 4, ], ],
            ['n1' => 6, 'n2' => 9, 'expect' => [1, 3, ], ],
            ['n1' => 8, 'n2' => 12, 'expect' => [1, 2, 4, ], ],
            ['n1' => 12, 'n2' => 18, 'expect' => [1, 2, 3, 6, ], ],
        ];
        $d = new Divisor();
        foreach ($cases as $case) {
            $this->assertSame($case['expect'], $d->commonDivisors($case['n1'], $case['n2']));
        }
    }

    public function test_removeDivisors_can_remove_divisors_correctly(): void
    {
        $cases = [
            ['d1' => [], 'd2' => [], 'expect' => [], ],
            ['d1' => [ 2 => 1, ], 'd2' => [], 'expect' => [ 2 => 1, ], ],
            ['d1' => [], 'd2' => [ 2 => 1, ], 'expect' => [], ],
            ['d1' => [ 2 => 1, ], 'd2' => [ 2 => 1, ], 'expect' => [ 1 => 1, ], ],
            ['d1' => [ 2 => 1, ], 'd2' => [ 3 => 1, ], 'expect' => [ 2 => 1, ], ],
            ['d1' => [ 2 => 2, ], 'd2' => [ 2 => 1, ], 'expect' => [ 2 => 1, ], ],
            ['d1' => [ 2 => 2, ], 'd2' => [ 2 => 2, ], 'expect' => [ 1 => 1, ], ],
            ['d1' => [ 2 => 3, ], 'd2' => [ 2 => 1, ], 'expect' => [ 2 => 2, ], ],
            ['d1' => [ 2 => 3, ], 'd2' => [ 2 => 2, ], 'expect' => [ 2 => 1, ], ],
            ['d1' => [ 2 => 3, ], 'd2' => [ 2 => 3, ], 'expect' => [ 1 => 1, ], ],
            ['d1' => [ 2 => 3, ], 'd2' => [ 2 => 4, ], 'expect' => [ 1 => 1, ], ],
            ['d1' => [ 2 => 3, 3 => 2, ], 'd2' => [], 'expect' => [ 2 => 3, 3 => 2, ], ],
            ['d1' => [ 2 => 3, 3 => 2, ], 'd2' => [ 5 => 1, ], 'expect' => [ 2 => 3, 3 => 2, ], ],
            ['d1' => [ 2 => 3, 3 => 2, ], 'd2' => [ 2 => 1, ], 'expect' => [ 2 => 2, 3 => 2, ], ],
            ['d1' => [ 2 => 3, 3 => 2, ], 'd2' => [ 2 => 2, ], 'expect' => [ 2 => 1, 3 => 2, ], ],
            ['d1' => [ 2 => 3, 3 => 2, ], 'd2' => [ 2 => 3, ], 'expect' => [ 3 => 2, ], ],
            ['d1' => [ 2 => 3, 3 => 2, ], 'd2' => [ 2 => 4, ], 'expect' => [ 3 => 2, ], ],
            ['d1' => [ 2 => 3, 3 => 2, ], 'd2' => [ 3 => 1, ], 'expect' => [ 2 => 3, 3 => 1, ], ],
            ['d1' => [ 2 => 3, 3 => 2, ], 'd2' => [ 3 => 2, ], 'expect' => [ 2 => 3, ], ],
            ['d1' => [ 2 => 3, 3 => 2, ], 'd2' => [ 3 => 3, ], 'expect' => [ 2 => 3, ], ],
            ['d1' => [ 2 => 3, 3 => 2, ], 'd2' => [ 2 => 1, 3 => 1, ], 'expect' => [ 2 => 2, 3 => 1, ], ],
            ['d1' => [ 2 => 3, 3 => 2, ], 'd2' => [ 2 => 2, 3 => 2, ], 'expect' => [ 2 => 1, ], ],
            ['d1' => [ 2 => 3, 3 => 2, ], 'd2' => [ 2 => 3, 3 => 3, ], 'expect' => [ 1 => 1, ], ],
            ['d1' => [ 2 => 3, 3 => 2, ], 'd2' => [ 2 => 4, 3 => 4, ], 'expect' => [ 1 => 1, ], ],
        ];
        $d = new Divisor();
        foreach ($cases as $case) {
            $this->assertSame($case['expect'], $d->removeDivisors($case['d1'], $case['d2']));
        }
    }

    public function test_reduceFraction_can_reduce_fraction_correctly(): void
    {
        $cases = [
            ['n1' => -10, 'n2' => -10, 'expect' => null, ],
            ['n1' => -1, 'n2' => -1, 'expect' => null, ],
            ['n1' => 0, 'n2' => 0, 'expect' => null, ],
            ['n1' => 1, 'n2' => 1, 'expect' => null, ],
            ['n1' => 2, 'n2' => 1, 'expect' => null, ],
            ['n1' => 1, 'n2' => 2, 'expect' => null, ],
            ['n1' => 4, 'n2' => 4, 'expect' => [[1 => 1], [1 => 1], ], ],
            ['n1' => 30, 'n2' => 45, 'expect' => [[2 => 1], [3 => 1], ], ],
            ['n1' => 8, 'n2' => 18, 'expect' => [[2 => 2], [3 => 2], ], ],
        ];
        $d = new Divisor();
        foreach ($cases as $case) {
            $this->assertSame($case['expect'], $d->reduceFraction($case['n1'], $case['n2']));
        }
    }
}
