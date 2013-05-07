<?php
/**
* Simple cli script to get a random number.
* 
* @author artodeto
* @since 2013-03-20
*/

if ($argc < 3) {
    echo 'not enough parameters given.' . PHP_EOL;
    exit(1);
}

echo (integer) mt_rand($argv[1], $argv[2]) . PHP_EOL;
