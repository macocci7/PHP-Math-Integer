<?php

require_once('../vendor/autoload.php');
require_once('../src/Number.php');
require_once('../src/Prime.php');
require_once('../src/Euclid.php');

use Macocci7\PhpMathInteger\Euclid;

$e = new Euclid();
$a = 390;
$b = 273;
var_dump($e->run($a, $b));
