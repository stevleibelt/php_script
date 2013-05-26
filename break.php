<?php
/**
 * Example for using break.
 *
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-26
 */

$array = array(
    '0' => 'zero',
    '1' => 'one',
    '2' => 'two',
    'foo' => 'bar',
    '3' => 'three',
    '4' => 'four'
);

$iterator = 0;

foreach ($array as $key => $value) {
    echo 'key: ' . $key . ' and value: ' . $value . PHP_EOL;
    if ($key === 'foo') {
        break;
    }

    $iterator++;
}

echo 'value of iterator: ' . $iterator . PHP_EOL;
