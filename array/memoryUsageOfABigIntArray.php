<?php

$array = array();
$endId = 500000;

echo 'Memory usage: ' . round(memory_get_usage(true)/1048576,2) . ' mb' . PHP_EOL;
echo 'Adding entries to array' . PHP_EOL;
for ($iterator = 1; $iterator <= $endId; $iterator++) {
    if ($iterator % 500 === 0) {
        $array[] = $iterator;
        echo '.';
    }
    if ($iterator % 50000 === 0) {
        echo PHP_EOL;
    }
}
echo PHP_EOL;
echo 'Memory usage: ' . round(memory_get_usage(true)/1048576,2) . ' mb' . PHP_EOL;
