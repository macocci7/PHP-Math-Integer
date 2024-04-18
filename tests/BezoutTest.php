<?php

declare(strict_types=1);

namespace Macocci7\PhpMathInteger;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Macocci7\PhpMathInteger\Bezout;

/**
 * @SuppressWarnings(PHPMD.CamelCaseMethodName)
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
final class BezoutTest extends TestCase
{
    public static function provide_set_can_throw_exception_with_invalid_param(): array
    {
        return [
            ['param' => [], 'message' => 'Invalid number of array elements. 3 expected.', ],
            ['param' => [1], 'message' => 'Invalid number of array elements. 3 expected.', ],
            ['param' => [1, 2, ], 'message' => 'Invalid number of array elements. 3 expected.', ],
            ['param' => [1, 2, 3, 4, ], 'message' => 'Invalid number of array elements. 3 expected.', ],
            ['param' => [1, 2, 3.4], 'message' => 'Invalid array element specified. Int expected.', ],
            ['param' => [1, 2, '3', ], 'message' => 'Invalid array element specified. Int expected.', ],
            ['param' => [1, 2, true, ], 'message' => 'Invalid array element specified. Int expected.', ],
            ['param' => [1, 2, false, ], 'message' => 'Invalid array element specified. Int expected.', ],
            ['param' => [1, 2, null, ], 'message' => 'Invalid array element specified. Int expected.', ],
            ['param' => [1, 2, [3], ], 'message' => 'Invalid array element specified. Int expected.', ],
            ['param' => [0, 2, 3, ], 'message' => 'Zero specified.', ],
            ['param' => [1, 0, 3, ], 'message' => 'Zero specified.', ],
            ['param' => [0, 0, 3, ], 'message' => 'Zero specified.', ],
        ];
    }

    #[DataProvider('provide_set_can_throw_exception_with_invalid_param')]
    public function test_set_can_throw_exception_with_invalid_param(array $param, string $message): void
    {
        $b = new Bezout();
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage($message);
        $b->set($param);
    }

    public static function provide_set_can_set_coefficients_correctly(): array
    {
        return [
            ['param' => [1, 2, 3, ], 'expect' => [1, 2, 3, ], ],
            ['param' => [1, 2, 0, ], 'expect' => [1, 2, 0, ], ],
        ];
    }

    #[DataProvider('provide_set_can_set_coefficients_correctly')]
    public function test_set_can_set_coefficients_correctly(array $param, array $expect): void
    {
        $b = new Bezout();
        $b->set($param);
        $this->assertTrue(
            $b->a === $expect[0]
            && $b->b === $expect[1]
            && $b->c === $expect[2]
        );
    }

    public static function provide_clear_can_clear_coefficients_correctly(): array
    {
        return [
            ['preset' => [1, 2, 3], 'expect' => [null, null, null, ], ],
        ];
    }

    #[DataProvider('provide_clear_can_clear_coefficients_correctly')]
    public function test_clear_can_clear_coeffecients_correctly(array $preset, array $expect): void
    {
        $b = new Bezout($preset);
        $b->clear();
        $this->assertTrue(
            $b->a === $expect[0]
            && $b->b === $expect[1]
            && $b->c === $expect[2]
        );
    }

    public static function provide_identity_can_return_identity_correctly(): array
    {
        return [
            ['preset' => [1, 2, 0, ], 'expect' => 'x + 2y = 0', ],
            ['preset' => [1, 1, 2, ], 'expect' => 'x + y = 2', ],
            ['preset' => [-1, -1, -2, ], 'expect' => '-x - y = -2', ],
            ['preset' => [3, 4, 1, ], 'expect' => '3x + 4y = 1', ],
            ['preset' => [-3, -4, -1, ], 'expect' => '-3x - 4y = -1', ],
        ];
    }

    #[DataProvider('provide_identity_can_return_identity_correctly')]
    public function test_identity_can_return_identity_correctly(array $preset, string|null $expect): void
    {
        $b = new Bezout($preset);
        $this->assertSame($expect, $b->identity());
    }

    public static function provide_isSolvable_can_judge_correctly(): array
    {
        return [
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
    }

    #[DataProvider('provide_isSolvable_can_judge_correctly')]
    public function test_isSolvable_can_judge_correctly(int|null $a, int|null $b, int|null $c, bool $expect): void
    {
        $bz = new Bezout();
        $bz->a = $a;
        $bz->b = $b;
        $bz->c = $c;
        $this->assertSame($expect, $bz->isSolvable());
    }

    public static function provide_solution_can_return_a_solution_set_correctly(): array
    {
        return [
            ['preset' => ['a' => 3, 'b' => 4, 'c' => 1, ], 'expect' => ['x' => -1, 'y' => 1, ], ],
            ['preset' => ['a' => 3, 'b' => 4, 'c' => -1, ], 'expect' => ['x' => 1, 'y' => -1, ], ],
            ['preset' => ['a' => 3, 'b' => -4, 'c' => 1, ], 'expect' => ['x' => -1, 'y' => -1, ], ],
            ['preset' => ['a' => -3, 'b' => 4, 'c' => 1, ], 'expect' => ['x' => 1, 'y' => 1, ], ],
            ['preset' => ['a' => 3, 'b' => 4, 'c' => 2, ], 'expect' => ['x' => -2, 'y' => 2, ], ],
        ];
    }

    #[DataProvider('provide_solution_can_return_a_solution_set_correctly')]
    public function test_solution_can_return_a_solution_set_correctly(array $preset, array $expect): void
    {
        $b = new Bezout();
        $b->a = $preset['a'];
        $b->b = $preset['b'];
        $b->c = $preset['c'];
        $s = $b->solution();
        $this->assertTrue(
            $s['solution']['x'] === $expect['x']
            && $s['solution']['y'] === $expect['y']
        );
    }

    public static function provide_generalSolution_can_return_general_solution_correctly(): array
    {
        return [
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
    }

    #[DataProvider('provide_generalSolution_can_return_general_solution_correctly')]
    public function test_generalSolution_can_return_general_solution_correctly(array $preset, array $expect): void
    {
        $b = new Bezout();
        $b->a = $preset['a'];
        $b->b = $preset['b'];
        $b->c = $preset['c'];
        $r = $b->generalSolution();
        $this->assertTrue(
            $r['generalSolution']['x']['a'] = $expect['x']['a']
            && $r['generalSolution']['x']['b'] = $expect['x']['b']
            && $r['generalSolution']['y']['a'] = $expect['y']['a']
            && $r['generalSolution']['y']['b'] = $expect['y']['b']
        );
    }
}
