<?php
date_default_timezone_set('Europe/Berlin');
$date = (int)date('ym').'01';
//int mktime  ([ int $Stunde  [, int $Minute  [, int $Sekunde  [, int $Monat  [, int $Tag  [, int $Jahr  [, int $is_dst  ]]]]]]] )
$mktime = mktime(0, 0, 0, date('m'), 1, date('y'));
$nextMonth = mktime(0, 0, 0, date('m')+1, 1, date('y'));

echo 'date:: ' . $date . PHP_EOL;
echo 'mktime:: ' . $mktime . PHP_EOL;
echo 'nextMonth:: ' .$nextMonth . PHP_EOL;
echo 'thisDate:: ' . date('d-F-Y', $mktime) . PHP_EOL;
echo 'nextDate:: ' . date('d-F-Y', $nextMonth) . PHP_EOL;
echo PHP_EOL;
echo 'thisMonth:: ' . (int)date('ymd', $mktime) . PHP_EOL;
echo 'nextMonth:: ' . (int)date('ymd', $nextMonth) . PHP_EOL;
?>
