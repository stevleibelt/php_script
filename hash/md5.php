<?php

$toHash = time();
$hashed = md5($toHash);

echo 'md5 of current timestemp (' . $toHash . ') is "' . $hashed . '"' . PHP_EOL;
echo 'md5 of (a) is "' . md5('a') . '"' . PHP_EOL;
echo 'md5 of (A) is "' . md5('A') . '"' . PHP_EOL;
