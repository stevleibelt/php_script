<?php
$maxExecutionTime = ini_get('max_execution_time'); 

echo 'current max execution time::' . $maxExecutionTime . PHP_EOL;


echo 'trying to double the  max execution time.' . PHP_EOL;

if ($maxExecutionTime > 0) {
  $maxExecutionTime = 2 * $maxExecutionTime;
} else {
  $maxExecutionTime = 1;
}

ini_set('max_execution_time', $maxExecutionTime);

echo 'current max execution time::' . $maxExecutionTime . PHP_EOL;
