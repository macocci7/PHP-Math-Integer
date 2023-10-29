<?php

declare(strict_types=1);

namespace Macocci7\PhpMathInteger;

require_once('vendor/autoload.php');
require_once('src/Number.php');
require_once('src/Prime.php');
require_once('src/Euclid.php');

use PHPUnit\Framework\TestCase;
use Macocci7\PhpMathInteger\Euclid;

final class EuclidTest extends TestCase
{
    public function test_run_can_run_euclidean_algorithm_correctly(): void
    {
        $cases = [
            [ 'a' => -10, 'b' => -10, 'expect' => null, ],
            [ 'a' => -1, 'b' => -1, 'expect' => null, ],
            [ 'a' => 0, 'b' => 0, 'expect' => null, ],
            [ 'a' => 0, 'b' => 2, 'expect' => null, ],
            [ 'a' => 2, 'b' => 0, 'expect' => null, ],
            /*
            [ 'a' => 1, 'b' => 1, 'expect' => null, ],
            [ 'a' => 1, 'b' => 2, 'expect' => null, ],
            [ 'a' => 2, 'b' => 1, 'expect' => null, ],
            [ 'a' => 2, 'b' => 2, 'expect' => null, ],
            */
        ];
        $e = new Euclid();
        foreach ($cases as $case) {
            $this->assertSame($case['expect'], $e->run($case['a'], $case['b']));
        }
    }
}
