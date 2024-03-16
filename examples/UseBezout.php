<?php

require_once('../vendor/autoload.php');

use Macocci7\PhpMathInteger\Bezout;

// Bezout's Identity: 3x + 4y = 1
$b = new Bezout([3, 4, 1, ]);
echo sprintf("Bezout's Identity: %s\n", $b->identity());

// Solvable or not
echo sprintf("Is it solvable? - %s.\n", ($b->isSolvable() ? 'Yes' : 'No'));

// A solution set
$s = $b->solution()['solution'];
echo sprintf("A solutionset: (x, y) = (%d, %d)\n", $s['x'], $s['y']);

// General solution
$g = $b->generalSolution()['generalSolution']['formula'];
echo sprintf("General solution:\n\t%s\n\t%s\n", $g['x'], $g['y']);
