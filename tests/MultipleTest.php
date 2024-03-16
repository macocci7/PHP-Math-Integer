<?php

declare(strict_types=1);

namespace Macocci7\PhpMathInteger;

require_once('vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Macocci7\PhpMathInteger\Multiple;

/**
 * @SuppressWarnings(PHPMD.CamelCaseMethodName)
 */
final class MultipleTest extends TestCase
{
    public static function provide_leastCommonMultipleFactors_can_return_value_correctly(): array
    {
        return [
            ['n1' => -10, 'n2' => -10, 'expect' => null, ],
            ['n1' => -1, 'n2' => -1, 'expect' => null, ],
            ['n1' => 0, 'n2' => 0, 'expect' => null, ],
            ['n1' => 1, 'n2' => 0, 'expect' => null, ],
            ['n1' => 0, 'n2' => 1, 'expect' => null, ],
            ['n1' => 1, 'n2' => 1, 'expect' => [ 1 => 1, ], ],
            ['n1' => 1, 'n2' => 2, 'expect' => [ 2 => 1, ], ],
            ['n1' => 1, 'n2' => 3, 'expect' => [ 3 => 1, ], ],
            ['n1' => 1, 'n2' => 4, 'expect' => [ 2 => 2, ], ],
            ['n1' => 1, 'n2' => 6, 'expect' => [ 2 => 1, 3 => 1 ], ],
            ['n1' => 1, 'n2' => 9, 'expect' => [ 3 => 2, ], ],
            ['n1' => 1, 'n2' => 12, 'expect' => [ 2 => 2, 3 => 1, ], ],
            ['n1' => 1, 'n2' => 36, 'expect' => [ 2 => 2, 3 => 2, ], ],
            ['n1' => 2, 'n2' => 3, 'expect' => [ 2 => 1, 3 => 1, ], ],
            ['n1' => 2, 'n2' => 4, 'expect' => [ 2 => 2, ], ],
            ['n1' => 2, 'n2' => 6, 'expect' => [ 2 => 1, 3 => 1, ], ],
            ['n1' => 3, 'n2' => 1, 'expect' => [ 3 => 1, ], ],
            ['n1' => 3, 'n2' => 2, 'expect' => [ 3 => 1, 2 => 1, ], ],
            ['n1' => 3, 'n2' => 3, 'expect' => [ 3 => 1, ], ],
            ['n1' => 3, 'n2' => 4, 'expect' => [ 3 => 1, 2 => 2, ], ],
            ['n1' => 3, 'n2' => 6, 'expect' => [ 3 => 1, 2 => 1, ], ],
            ['n1' => 3, 'n2' => 9, 'expect' => [ 3 => 2, ], ],
            ['n1' => 4, 'n2' => 1, 'expect' => [ 2 => 2, ], ],
            ['n1' => 4, 'n2' => 2, 'expect' => [ 2 => 2, ], ],
            ['n1' => 4, 'n2' => 3, 'expect' => [ 2 => 2, 3 => 1, ], ],
            ['n1' => 4, 'n2' => 4, 'expect' => [ 2 => 2, ], ],
            ['n1' => 4, 'n2' => 5, 'expect' => [ 2 => 2, 5 => 1, ], ],
            ['n1' => 4, 'n2' => 6, 'expect' => [ 2 => 2, 3 => 1, ], ],
            ['n1' => 4, 'n2' => 8, 'expect' => [ 2 => 3, ], ],
        ];
    }

    /**
     * @dataProvider provide_leastCommonMultipleFactors_can_return_value_correctly
     */
    public function test_leastCommonMultipleFactors_can_return_value_correctly(int $n1, int $n2, array|null $expect): void
    {
        $m = new Multiple();
        $this->assertSame($expect, $m->leastCommonMultipleFactors($n1, $n2));
    }

    public static function provide_leastCommonMultiple_can_return_value_correctly(): array
    {
        return [
            ['n1' => -10, 'n2' => -10, 'expect' => null, ],
            ['n1' => -1, 'n2' => -1, 'expect' => null, ],
            ['n1' => 0, 'n2' => 0, 'expect' => null, ],
            ['n1' => 0, 'n2' => 1, 'expect' => null, ],
            ['n1' => 1, 'n2' => 0, 'expect' => null, ],
            ['n1' => 1, 'n2' => 1, 'expect' => 1, ],
            ['n1' => 1, 'n2' => 2, 'expect' => 2, ],
            ['n1' => 1, 'n2' => 3, 'expect' => 3, ],
            ['n1' => 2, 'n2' => 1, 'expect' => 2, ],
            ['n1' => 2, 'n2' => 2, 'expect' => 2, ],
            ['n1' => 2, 'n2' => 3, 'expect' => 6, ],
            ['n1' => 2, 'n2' => 4, 'expect' => 4, ],
            ['n1' => 3, 'n2' => 1, 'expect' => 3, ],
            ['n1' => 3, 'n2' => 2, 'expect' => 6, ],
            ['n1' => 3, 'n2' => 3, 'expect' => 3, ],
            ['n1' => 3, 'n2' => 4, 'expect' => 12, ],
            ['n1' => 3, 'n2' => 6, 'expect' => 6, ],
            ['n1' => 4, 'n2' => 1, 'expect' => 4, ],
            ['n1' => 4, 'n2' => 2, 'expect' => 4, ],
            ['n1' => 4, 'n2' => 3, 'expect' => 12, ],
            ['n1' => 4, 'n2' => 4, 'expect' => 4, ],
            ['n1' => 4, 'n2' => 6, 'expect' => 12, ],
            ['n1' => 4, 'n2' => 8, 'expect' => 8, ],
        ];
    }

    /**
     * @dataProvider provide_leastCommonMultiple_can_return_value_correctly
     */
    public function test_leastCommonMultiple_can_return_value_correctly(int $n1, int $n2, int|null $expect): void
    {
        $m = new Multiple();
        $this->assertSame($expect, $m->leastCommonMultiple($n1, $n2));
    }
}
