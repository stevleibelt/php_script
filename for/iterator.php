#!/bin/php
<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-01-07
 */

$maximum = 5;

echo 'maximum: ' . $maximum . PHP_EOL;
echo 'for loop with $iterator++' . PHP_EOL;

for ($iterator = 0; $iterator < $maximum; $iterator++) {
    echo 'iterator: ' . $iterator . PHP_EOL;
}

echo 'for loop with ++$iterator' . PHP_EOL;

for ($iterator = 0; $iterator < $maximum; ++$iterator) {
    echo 'iterator: ' . $iterator . PHP_EOL;
}
