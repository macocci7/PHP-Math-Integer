<?php

declare(strict_types=1);

namespace Macocci7\PhpMathInteger;

require_once('vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Macocci7\PhpMathInteger\Divisor;

/**
 * @SuppressWarnings(PHPMD.CamelCaseMethodName)
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
final class DivisorTest extends TestCase
{
    public static function provide_count_can_count_correctly(): array
    {
        return [
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
    }

    /**
     * @dataProvider provide_count_can_count_correctly
     */
    public function test_count_can_count_correctly(int $param, int|null $expect): void
    {
        $d = new Divisor();
        $this->assertSame($expect, $d->count($param));
    }

    public static function provide_value_can_return_value_correctly(): array
    {
        return [
            ['f' => [], 'expect' => null, ],
            ['f' => [null], 'expect' => null, ],
            ['f' => [0], 'expect' => null, ],
            ['f' => [ 1 => 0, ], 'expect' => 1, ],
            ['f' => [ 1 => 1, ], 'expect' => 1, ],
            ['f' => [ 2 => 0, ], 'expect' => 1, ],
            ['f' => [ 2 => 1, ], 'expect' => 2, ],
            ['f' => [ 2 => 2, ], 'expect' => 4, ],
            ['f' => [ 2 => 3, ], 'expect' => 8, ],
            ['f' => [ 3 => 0, ], 'expect' => 1, ],
            ['f' => [ 3 => 1, ], 'expect' => 3, ],
            ['f' => [ 3 => 2, ], 'expect' => 9, ],
            ['f' => [ 3 => 3, ], 'expect' => 27, ],
            ['f' => [ 2 => 0, 3 => 0, ], 'expect' => 1, ],
            ['f' => [ 2 => 1, 3 => 1, ], 'expect' => 6, ],
            ['f' => [ 2 => 2, 3 => 2, ], 'expect' => 36, ],
            ['f' => [ 2 => 3, 3 => 4, ], 'expect' => 648, ],
        ];
    }

    /**
     * @dataProvider provide_value_can_return_value_correctly
     */
    public function test_value_can_return_value_correctly(array $f, int|null $expect): void
    {
        $d = new Divisor();
        $this->assertSame($expect, $d->value($f));
    }

    public static function provide_formula_can_return_formula_correctly(): array
    {
        return [
            ['n' => -10, 'expect' => null, ],
            ['n' => -1, 'expect' => null, ],
            ['n' => 0, 'expect' => null, ],
            ['n' => 1, 'expect' => '1', ],
            ['n' => 2, 'expect' => '2', ],
            ['n' => 3, 'expect' => '3', ],
            ['n' => 4, 'expect' => '2 ^ 2', ],
            ['n' => 5, 'expect' => '5', ],
            ['n' => 6, 'expect' => '2 * 3', ],
            ['n' => 7, 'expect' => '7', ],
            ['n' => 8, 'expect' => '2 ^ 3', ],
            ['n' => 9, 'expect' => '3 ^ 2', ],
            ['n' => 10, 'expect' => '2 * 5', ],
            ['n' => 11, 'expect' => '11', ],
            ['n' => 12, 'expect' => '2 ^ 2 * 3', ],
            ['n' => 13, 'expect' => '13', ],
            ['n' => 14, 'expect' => '2 * 7', ],
            ['n' => 15, 'expect' => '3 * 5', ],
            ['n' => 16, 'expect' => '2 ^ 4', ],
            ['n' => 17, 'expect' => '17', ],
            ['n' => 18, 'expect' => '2 * 3 ^ 2', ],
            ['n' => 19, 'expect' => '19', ],
            ['n' => 20, 'expect' => '2 ^ 2 * 5', ],
            ['n' => 21, 'expect' => '3 * 7', ],
            ['n' => 22, 'expect' => '2 * 11', ],
            ['n' => 23, 'expect' => '23', ],
            ['n' => 24, 'expect' => '2 ^ 3 * 3', ],
            ['n' => 36, 'expect' => '2 ^ 2 * 3 ^ 2', ],
        ];
    }

    /**
     * @dataProvider provide_formula_can_return_formula_correctly
     */
    public function test_formula_can_return_formula_correctly(int $n, string|null $expect): void
    {
        $d = new Divisor();
        $this->assertSame($expect, $d->formula($n));
    }

    public static function provide_list_can_list_divisors_correctly(): array
    {
        return [
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
    }

    /**
     * @dataProvider provide_list_can_list_divisors_correctly
     */
    public function test_list_can_list_divisors_correctly(int $param, array|null $expect): void
    {
        $d = new Divisor();
        $this->assertSame($expect, $d->list($param));
    }

    public static function provide_commonFactors_can_return_common_factors_correctly(): array
    {
        return [
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
    }

    /**
     * @dataProvider provide_commonFactors_can_return_common_factors_correctly
     */
    public function test_commonFactors_can_return_common_factors_correctly(int $n1, int $n2, array|null $expect): void
    {
        $d = new Divisor();
        $this->assertSame($expect, $d->commonFactors($n1, $n2));
    }

    public static function provide_greatestCommonFactor_can_return_great_common_factor_correctly(): array
    {
        return [
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
    }

    /**
     * @dataProvider provide_greatestCommonFactor_can_return_great_common_factor_correctly
     */
    public function test_greatestCommonFactor_can_return_great_common_factor_correctly(int $n1, int $n2, int|null $expect): void
    {
        $d = new Divisor();
        $this->assertSame($expect, $d->greatestCommonFactor($n1, $n2));
    }

    public static function provide_commonDivisors_can_list_common_divisors_correctly(): array
    {
        return [
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
    }

    /**
     * @dataProvider provide_commonDivisors_can_list_common_divisors_correctly
     */
    public function test_commonDivisors_can_list_common_divisors_correctly(int $n1, int $n2, array|null $expect): void
    {
        $d = new Divisor();
        $this->assertSame($expect, $d->commonDivisors($n1, $n2));
    }

    public static function provide_removeDivisors_can_remove_divisors_correctly(): array
    {
        return [
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
    }

    /**
     * @dataProvider provide_removeDivisors_can_remove_divisors_correctly
     */
    public function test_removeDivisors_can_remove_divisors_correctly(array $d1, array $d2, array $expect): void
    {
        $d = new Divisor();
        $this->assertSame($expect, $d->removeDivisors($d1, $d2));
    }

    public static function provide_reduceFraction_can_reduce_fraction_correctly(): array
    {
        return [
            ['n1' => -10, 'n2' => -10, 'expect' => null, ],
            ['n1' => -1, 'n2' => -1, 'expect' => null, ],
            ['n1' => 0, 'n2' => 0, 'expect' => null, ],
            ['n1' => 1, 'n2' => 1, 'expect' => null, ],
            ['n1' => 2, 'n2' => 1, 'expect' => null, ],
            ['n1' => 1, 'n2' => 2, 'expect' => null, ],
            ['n1' => 2, 'n2' => 2, 'expect' => [[1 => 1], [1 => 1], ], ],
            ['n1' => 4, 'n2' => 4, 'expect' => [[1 => 1], [1 => 1], ], ],
            ['n1' => 30, 'n2' => 45, 'expect' => [[2 => 1], [3 => 1], ], ],
            ['n1' => 8, 'n2' => 18, 'expect' => [[2 => 2], [3 => 2], ], ],
        ];
    }

    /**
     * @dataProvider provide_reduceFraction_can_reduce_fraction_correctly
     */
    public function test_reduceFraction_can_reduce_fraction_correctly(int $n1, int $n2, array|null $expect): void
    {
        $d = new Divisor();
        $this->assertSame($expect, $d->reduceFraction($n1, $n2));
    }
}
