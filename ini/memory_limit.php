<?php
$memoryLimit = ini_get('memory_limit');

echo 'current memory limit::' . $memoryLimit . PHP_EOL;


$memoryUnit = substr($memoryLimit, -1, 1);

echo 'memory unit is :' . $memoryUnit . PHP_EOL;

if (is_int($memoryUnit)) {
  $memoryUnit = '';
}

echo 'trying to double the  memory limit.' . PHP_EOL;

$memoryLimit = 2 * $memoryLimit;
$memoryLimit .= $memoryUnit;

ini_set('memory_limit', $memoryLimit);

echo 'current memory limit::' . $memoryLimit . PHP_EOL;
