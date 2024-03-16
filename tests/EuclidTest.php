<?php

declare(strict_types=1);

namespace Macocci7\PhpMathInteger;

require_once('vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Macocci7\PhpMathInteger\Euclid;

/**
 * @SuppressWarnings(PHPMD.CamelCaseMethodName)
 * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
 */
final class EuclidTest extends TestCase
{
    public static function provide_run_can_run_euclidean_algorithm_correctly(): array
    {
        return [
            [ 'a' => -10, 'b' => -10, 'expect' => null, ],
            [ 'a' => -1, 'b' => -1, 'expect' => null, ],
            [ 'a' => 0, 'b' => 0, 'expect' => null, ],
            [ 'a' => 0, 'b' => 2, 'expect' => null, ],
            [ 'a' => 2, 'b' => 0, 'expect' => null, ],
            [
                'a' => 1,
                'b' => 1,
                'expect' => [
                    'gcd' => 1,
                    'processText' => [
                        '1 = 1 * 1 + 0',
                    ],
                    'processData' => [
                        [
                            'a' => 1,
                            'b' => 1,
                            'c' => 1,
                            'r' => 0,
                        ],
                    ],
                ],
            ],
            [
                'a' => 1,
                'b' => 2,
                'expect' => [
                    'gcd' => 1,
                    'processText' => [
                        '2 = 1 * 2 + 0',
                    ],
                    'processData' => [
                        [
                            'a' => 2,
                            'b' => 1,
                            'c' => 2,
                            'r' => 0,
                        ],
                    ],
                ],
            ],
            [
                'a' => 2,
                'b' => 1,
                'expect' => [
                    'gcd' => 1,
                    'processText' => [
                        '2 = 1 * 2 + 0',
                    ],
                    'processData' => [
                        [
                            'a' => 2,
                            'b' => 1,
                            'c' => 2,
                            'r' => 0,
                        ],
                    ],
                ],
            ],
            [
                'a' => 2,
                'b' => 2,
                'expect' => [
                    'gcd' => 2,
                    'processText' => [
                        '2 = 2 * 1 + 0',
                    ],
                    'processData' => [
                        [
                            'a' => 2,
                            'b' => 2,
                            'c' => 1,
                            'r' => 0,
                        ],
                    ],
                ],
            ],
            [
                'a' => 2,
                'b' => 3,
                'expect' => [
                    'gcd' => 1,
                    'processText' => [
                        '3 = 2 * 1 + 1',
                        '2 = 1 * 2 + 0',
                    ],
                    'processData' => [
                        [
                            'a' => 3,
                            'b' => 2,
                            'c' => 1,
                            'r' => 1,
                        ],
                        [
                            'a' => 2,
                            'b' => 1,
                            'c' => 2,
                            'r' => 0,
                        ],
                    ],
                ],
            ],
            [
                'a' => 3,
                'b' => 4,
                'expect' => [
                    'gcd' => 1,
                    'processText' => [
                        '4 = 3 * 1 + 1',
                        '3 = 1 * 3 + 0',
                    ],
                    'processData' => [
                        [
                            'a' => 4,
                            'b' => 3,
                            'c' => 1,
                            'r' => 1,
                        ],
                        [
                            'a' => 3,
                            'b' => 1,
                            'c' => 3,
                            'r' => 0,
                        ],
                    ],
                ],
            ],
            [
                'a' => 2,
                'b' => 4,
                'expect' => [
                    'gcd' => 2,
                    'processText' => [
                        '4 = 2 * 2 + 0',
                    ],
                    'processData' => [
                        [
                            'a' => 4,
                            'b' => 2,
                            'c' => 2,
                            'r' => 0,
                        ],
                    ],
                ],
            ],
            [
                'a' => 6,
                'b' => 8,
                'expect' => [
                    'gcd' => 2,
                    'processText' => [
                        '8 = 6 * 1 + 2',
                        '6 = 2 * 3 + 0',
                    ],
                    'processData' => [
                        [
                            'a' => 8,
                            'b' => 6,
                            'c' => 1,
                            'r' => 2,
                        ],
                        [
                            'a' => 6,
                            'b' => 2,
                            'c' => 3,
                            'r' => 0,
                        ],
                    ],
                ],
            ],
            [
                'a' => 12,
                'b' => 18,
                'expect' => [
                    'gcd' => 6,
                    'processText' => [
                        '18 = 12 * 1 + 6',
                        '12 = 6 * 2 + 0',
                    ],
                    'processData' => [
                        [
                            'a' => 18,
                            'b' => 12,
                            'c' => 1,
                            'r' => 6,
                        ],
                        [
                            'a' => 12,
                            'b' => 6,
                            'c' => 2,
                            'r' => 0,
                        ],
                    ],
                ],
            ],
            [
                'a' => 390,
                'b' => 273,
                'expect' => [
                    'gcd' => 39,
                    'processText' => [
                        '390 = 273 * 1 + 117',
                        '273 = 117 * 2 + 39',
                        '117 = 39 * 3 + 0',
                    ],
                    'processData' => [
                        [
                            'a' => 390,
                            'b' => 273,
                            'c' => 1,
                            'r' => 117,
                        ],
                        [
                            'a' => 273,
                            'b' => 117,
                            'c' => 2,
                            'r' => 39,
                        ],
                        [
                            'a' => 117,
                            'b' => 39,
                            'c' => 3,
                            'r' => 0,
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * @dataProvider provide_run_can_run_euclidean_algorithm_correctly
     */
    public function test_run_can_run_euclidean_algorithm_correctly(int $a, int $b, array|null $expect): void
    {
        $e = new Euclid();
        $this->assertSame($expect, $e->run($a, $b));
    }

    public static function provide_gcd_can_return_gcd_correctly(): array
    {
        return [
            ['a' => -10, 'b' => -10, 'expect' => null, ],
            ['a' => -1, 'b' => -1, 'expect' => null, ],
            ['a' => 0, 'b' => 0, 'expect' => null, ],
            ['a' => 0, 'b' => 1, 'expect' => null, ],
            ['a' => 1, 'b' => 0, 'expect' => null, ],
            ['a' => 1, 'b' => 1, 'expect' => 1, ],
            ['a' => 1, 'b' => 2, 'expect' => 1, ],
            ['a' => 2, 'b' => 1, 'expect' => 1, ],
            ['a' => 2, 'b' => 2, 'expect' => 2, ],
            ['a' => 2, 'b' => 3, 'expect' => 1, ],
            ['a' => 3, 'b' => 2, 'expect' => 1, ],
            ['a' => 3, 'b' => 3, 'expect' => 3, ],
            ['a' => 2, 'b' => 4, 'expect' => 2, ],
            ['a' => 6, 'b' => 9, 'expect' => 3, ],
            ['a' => 8, 'b' => 12, 'expect' => 4, ],
        ];
    }

    /**
     * @dataProvider provide_gcd_can_return_gcd_correctly
     */
    public function test_gcd_can_return_gcd_correctly(int $a, int $b, int|null $expect): void
    {
        $e = new Euclid();
        $this->assertSame($expect, $e->gcd($a, $b));
    }

    public static function provide_isGcdOf_can_judge_correctly(): array
    {
        return [
            ['c' => -10, 'a' => -10, 'b' => -10, 'expect' => false, ],
            ['c' => -1, 'a' => -1, 'b' => -1, 'expect' => false, ],
            ['c' => 0, 'a' => 0, 'b' => 0, 'expect' => false, ],
            ['c' => 1, 'a' => 0, 'b' => 0, 'expect' => false, ],
            ['c' => 1, 'a' => 1, 'b' => 0, 'expect' => false, ],
            ['c' => 1, 'a' => 0, 'b' => 1, 'expect' => false, ],
            ['c' => 0, 'a' => 1, 'b' => 0, 'expect' => false, ],
            ['c' => 0, 'a' => 1, 'b' => 1, 'expect' => false, ],
            ['c' => 0, 'a' => 0, 'b' => 1, 'expect' => false, ],
            ['c' => 1, 'a' => 1, 'b' => 1, 'expect' => true, ],
            ['c' => 1, 'a' => 1, 'b' => 2, 'expect' => true, ],
            ['c' => 1, 'a' => 2, 'b' => 1, 'expect' => true, ],
            ['c' => 1, 'a' => 2, 'b' => 3, 'expect' => true, ],
            ['c' => 3, 'a' => 2, 'b' => 1, 'expect' => false, ],
            ['c' => 2, 'a' => 4, 'b' => 6, 'expect' => true, ],
            ['c' => 3, 'a' => 6, 'b' => 9, 'expect' => true, ],
            ['c' => 4, 'a' => 4, 'b' => 8, 'expect' => true, ],
        ];
    }

    /**
     * @dataProvider provide_isGcdOf_can_judge_correctly
     */
    public function test_isGcdOf_can_judge_correctly(int $c, int $a, int $b, bool $expect): void
    {
        $e = new Euclid();
        $this->assertSame($expect, $e->isGcdOf($c, $a, $b));
    }

    public static function provide_isCoprime_can_judge_correctly(): array
    {
        return [
            ['a' => -10, 'b' => -10, 'expect' => false, ],
            ['a' => -1, 'b' => -1, 'expect' => false, ],
            ['a' => -1, 'b' => 2, 'expect' => false, ],
            ['a' => 0, 'b' => 0, 'expect' => false, ],
            ['a' => 0, 'b' => 1, 'expect' => false, ],
            ['a' => 1, 'b' => 0, 'expect' => false, ],
            ['a' => 1, 'b' => 1, 'expect' => false, ],
            ['a' => 1, 'b' => 2, 'expect' => true, ],
            ['a' => 2, 'b' => -1, 'expect' => false, ],
            ['a' => 2, 'b' => 1, 'expect' => true, ],
            ['a' => 2, 'b' => 2, 'expect' => false, ],
            ['a' => 2, 'b' => 3, 'expect' => true, ],
            ['a' => 2, 'b' => 4, 'expect' => false, ],
            ['a' => 3, 'b' => 4, 'expect' => true, ],
            ['a' => 4, 'b' => 6, 'expect' => false, ],
            ['a' => 4, 'b' => 9, 'expect' => true, ],
        ];
    }

    /**
     * @dataProvider provide_isCoprime_can_judge_correctly
     */
    public function test_isCoprime_can_judge_correctly(int $a, int $b, bool $expect): void
    {
        $e = new Euclid();
        $this->assertSame($expect, $e->isCoprime($a, $b));
    }
}
