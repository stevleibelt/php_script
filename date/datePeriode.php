<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-12-13
 */

$now = new DateTime(strtotime('now'));
$lastDay = new DateTime(strtotime('-1 day'));
$lastMonth = new DateTime(strtotime('-1 month'));

echo 'now: ' . $now . PHP_EOL;
echo '-1 day: ' . $lastDay . PHP_EOL;
echo '-1 month: ' . $lastMonth . PHP_EOL;
