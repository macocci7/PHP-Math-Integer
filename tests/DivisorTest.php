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
}
