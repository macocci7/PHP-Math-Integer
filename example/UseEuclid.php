<?php

require_once('../src/loader.php');

use Macocci7\PhpMathInteger\Euclid;

$e = new Euclid();
$a = 390;
$b = 273;
var_dump($e->run($a, $b));
