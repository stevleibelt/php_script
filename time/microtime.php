<?php

echo 'microtime()::' . var_export(microtime(), true) . PHP_EOL;
echo 'microtime(true)::' . var_export(microtime(true), true) . PHP_EOL;
echo PHP_EOL;

$start = microtime(true);
sleep(1);
$end = microtime(true);
$diff = $end - $start;
echo 'diff of to microtimes with a sleep of 1 second::' . var_export($diff, true) . PHP_EOL;
