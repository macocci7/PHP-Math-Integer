<?php

declare(strict_types=1);

namespace Macocci7\PhpMathInteger;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Macocci7\PhpMathInteger\Prime;

/**
 * @SuppressWarnings(PHPMD.CamelCaseMethodName)
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
final class PrimeTest extends TestCase
{
    public static function provide_isPrime_can_judge_correctly(): array
    {
        return [
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
    }

    #[DataProvider('provide_isPrime_can_judge_correctly')]
    public function test_isPrime_can_judge_correctly(int $param, bool $expect): void
    {
        $p = new Prime();
        $this->assertSame($p->isPrime($param), $expect);
    }

    public static function provide_isPrimeAll_can_judge_correctly(): array
    {
        return [
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
    }

    #[DataProvider('provide_isPrimeAll_can_judge_correctly')]
    public function test_isPrimeAll_can_judge_correctly(array $param, bool $expect): void
    {
        $p = new Prime();
        $this->assertSame($expect, $p->isPrimeAll($param));
    }

    public static function provide_previous_can_return_previous_prime_correctly(): array
    {
        return [
            ['param' => -1, 'expect' => null,],
            ['param' => 0, 'expect' => null,],
            ['param' => 1, 'expect' => null,],
            ['param' => 2, 'expect' => null,],
            ['param' => 3, 'expect' => 2,],
            ['param' => 4, 'expect' => 3,],
            ['param' => 5, 'expect' => 3,],
            ['param' => 6, 'expect' => 5,],
            ['param' => 7, 'expect' => 5,],
            ['param' => 8, 'expect' => 7,],
            ['param' => 9, 'expect' => 7,],
            ['param' => 10, 'expect' => 7,],
            ['param' => 11, 'expect' => 7,],
        ];
    }

    #[DataProvider('provide_previous_can_return_previous_prime_correctly')]
    public function test_previous_can_return_previous_prime_correctly(int $param, int|null $expect): void
    {
        $p = new Prime();
        $this->assertSame($p->previous($param), $expect);
    }

    public static function provide_next_can_return_next_prime_correctly(): array
    {
        return [
            ['param' => -1, 'expect' => 2,],
            ['param' => 0, 'expect' => 2,],
            ['param' => 1, 'expect' => 2,],
            ['param' => 2, 'expect' => 3,],
            ['param' => 3, 'expect' => 5,],
            ['param' => 4, 'expect' => 5,],
            ['param' => 5, 'expect' => 7,],
            ['param' => 6, 'expect' => 7,],
        ];
    }

    #[DataProvider('provide_next_can_return_next_prime_correctly')]
    public function test_next_can_return_next_prime_correctly(int $param, int $expect): void
    {
        $p = new Prime();
        $this->assertSame($p->next($param), $expect);
    }

    public static function provide_between_can_throw_exception_with_invalid_params(): array
    {
        return [
            ['a' => -1, 'b' => -1, 'message' => 'Specify numbers greater than 1.', ],
            ['a' => 0, 'b' => 0, 'message' => 'Specify numbers greater than 1.', ],
            ['a' => 0, 'b' => 1, 'message' => 'Specify numbers greater than 1.', ],
            ['a' => 0, 'b' => 2, 'message' => 'Specify numbers greater than 1.', ],
            ['a' => 0, 'b' => 3, 'message' => 'Specify numbers greater than 1.', ],
            ['a' => 1, 'b' => 0, 'message' => 'Specify numbers greater than 1.', ],
            ['a' => 1, 'b' => 1, 'message' => 'Specify numbers greater than 1.', ],
            ['a' => 1, 'b' => 2, 'message' => 'Specify numbers greater than 1.', ],
            ['a' => 1, 'b' => 3, 'message' => 'Specify numbers greater than 1.', ],
            ['a' => 2, 'b' => 0, 'message' => 'Specify numbers greater than 1.', ],
            ['a' => 2, 'b' => 1, 'message' => 'Specify numbers greater than 1.', ],
        ];
    }

    #[DataProvider('provide_between_can_throw_exception_with_invalid_params')]
    public function test_between_can_throw_exception_with_invalid_params(int $a, int $b, string $message): void
    {
        $p = new Prime();
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage($message);
        $p->between($a, $b);
    }

    public static function provide_between_can_return_primes_correctly(): array
    {
        return [
            [ 'a' => 2, 'b' => 2, 'expect' => [2], ],
            [ 'a' => 2, 'b' => 3, 'expect' => [ 2, 3, ], ],
            [ 'a' => 2, 'b' => 4, 'expect' => [ 2, 3, ], ],
            [ 'a' => 2, 'b' => 5, 'expect' => [ 2, 3, 5, ], ],
            [ 'a' => 2, 'b' => 6, 'expect' => [ 2, 3, 5, ], ],
            [ 'a' => 2, 'b' => 7, 'expect' => [ 2, 3, 5, 7, ], ],
            [ 'a' => 2, 'b' => 8, 'expect' => [ 2, 3, 5, 7, ], ],
            [ 'a' => 2, 'b' => 9, 'expect' => [ 2, 3, 5, 7, ], ],
            [ 'a' => 2, 'b' => 10, 'expect' => [ 2, 3, 5, 7, ], ],
            [ 'a' => 2, 'b' => 11, 'expect' => [ 2, 3, 5, 7, 11], ],
            [ 'a' => 3, 'b' => 2, 'expect' => [ 2, 3, ], ],
            [ 'a' => 3, 'b' => 3, 'expect' => [3], ],
            [ 'a' => 3, 'b' => 4, 'expect' => [3], ],
            [ 'a' => 3, 'b' => 5, 'expect' => [ 3, 5, ], ],
            [ 'a' => 3, 'b' => 6, 'expect' => [ 3, 5, ], ],
            [ 'a' => 3, 'b' => 7, 'expect' => [ 3, 5, 7, ], ],
            [ 'a' => 3, 'b' => 8, 'expect' => [ 3, 5, 7, ], ],
            [ 'a' => 3, 'b' => 9, 'expect' => [ 3, 5, 7, ], ],
            [ 'a' => 3, 'b' => 10, 'expect' => [ 3, 5, 7, ], ],
            [ 'a' => 3, 'b' => 11, 'expect' => [3, 5, 7, 11, ], ],
            [ 'a' => 4, 'b' => 2, 'expect' => [ 2, 3, ], ],
            [ 'a' => 4, 'b' => 3, 'expect' => [3], ],
            [ 'a' => 4, 'b' => 4, 'expect' => [], ],
            [ 'a' => 4, 'b' => 5, 'expect' => [5], ],
            [ 'a' => 4, 'b' => 6, 'expect' => [5], ],
            [ 'a' => 4, 'b' => 7, 'expect' => [ 5, 7, ], ],
            [ 'a' => 4, 'b' => 8, 'expect' => [ 5, 7, ], ],
            [ 'a' => 4, 'b' => 9, 'expect' => [ 5, 7, ], ],
            [ 'a' => 4, 'b' => 10, 'expect' => [ 5, 7, ], ],
            [ 'a' => 4, 'b' => 11, 'expect' => [ 5, 7, 11, ], ],
            [ 'a' => 4, 'b' => 12, 'expect' => [ 5, 7, 11, ], ],
            [ 'a' => 5, 'b' => 2, 'expect' => [ 2, 3, 5, ], ],
            [ 'a' => 5, 'b' => 3, 'expect' => [ 3, 5, ], ],
            [ 'a' => 5, 'b' => 4, 'expect' => [5], ],
            [ 'a' => 5, 'b' => 5, 'expect' => [5], ],
            [ 'a' => 5, 'b' => 6, 'expect' => [5], ],
            [ 'a' => 5, 'b' => 7, 'expect' => [ 5, 7, ], ],
            [ 'a' => 5, 'b' => 8, 'expect' => [ 5, 7, ], ],
            [ 'a' => 5, 'b' => 9, 'expect' => [ 5, 7, ], ],
            [ 'a' => 5, 'b' => 10, 'expect' => [ 5, 7, ], ],
            [ 'a' => 5, 'b' => 11, 'expect' => [ 5, 7, 11, ], ],
        ];
    }

    #[DataProvider('provide_between_can_return_primes_correctly')]
    public function test_between_can_return_primes_correctly(int $a, int $b, array $expect): void
    {
        $p = new Prime();
        $this->assertSame($p->between($a, $b), $expect);
    }

    public static function provide_factorize_can_factorize_correctly(): array
    {
        return [
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
    }

    #[DataProvider('provide_factorize_can_factorize_correctly')]
    public function test_factorize_can_factorize_correctly(int $param, array|null $expect): void
    {
        $p = new Prime();
        $this->assertSame($p->factorize($param), $expect);
    }

    public static function provide_factors_can_return_factors_correctly(): array
    {
        return [
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
    }

    #[DataProvider('provide_factors_can_return_factors_correctly')]
    public function test_factors_can_return_factors_correctly(int $param, array|null $expect): void
    {
        $p = new Prime();
        $this->assertSame($p->factors($param), $expect);
    }

    public static function provide_countSameElements_can_return_result_correctly(): array
    {
        return [
            ['param' => [], 'expect' => [], ],
            ['param' => [1], 'expect' => null, ],
            ['param' => [2, 3, ], 'expect' => [2 => 1, 3 => 1, ], ],
            ['param' => [2, 2, 3, ], 'expect' => [2 => 2, 3 => 1, ], ],
            ['param' => [2, 2, 2, 3, 3, 5, ], 'expect' => [2 => 3, 3 => 2, 5 => 1, ], ],
        ];
    }

    #[DataProvider('provide_countSameElements_can_return_result_correctly')]
    public function test_countSameElements_can_return_result_correctly(array $param, array|null $expect): void
    {
        $p = new Prime();
        $this->assertSame($p->countSameElements($param), $expect);
    }

    public static function provide_factorizedFormula_can_return_formula_correctly(): array
    {
        return [
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
    }

    #[DataProvider('provide_factorizedFormula_can_return_formula_correctly')]
    public function test_factorizedFormula_can_return_formula_correctly(int $param, array|null $expect): void
    {
        $p = new Prime();
        $this->assertSame($expect, $p->factorizedFormula($param));
    }
}
