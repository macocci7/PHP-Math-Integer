<?php

require_once('../vendor/autoload.php');
require_once('../src/Number.php');
require_once('../src/Prime.php');
require_once('../src/Euclid.php');

use Macocci7\PhpMathInteger\Euclid;

$e = new Euclid();
$a = 3;
$b = 4;
var_dump($e->run($a, $b));
