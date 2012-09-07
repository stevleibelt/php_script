<?php

$now = mktime();

$plus16Days = '+16 day 03:00:00';
$timePlus16Days = strtotime($plus16Days, $now);
$plusZero = 'now';
$timeZero = strtotime($plusZero, $now);

echo 'today timestamp::' . $now . PHP_EOL;
echo 'today date::' . date('Y-m-d H:i:s', $now) . PHP_EOL;
echo 'plus zero timestamp::' . $timeZero . PHP_EOL;
echo 'plus zero date::' . date('Y-m-d H:i:s', $timeZero) . PHP_EOL;
echo 'plus 16 days timestamp::' . $timePlus16Days . PHP_EOL;
echo 'plus 16 days date::' . date('Y-m-d H:i:s', $timePlus16Days) . PHP_EOL;
