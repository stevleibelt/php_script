<?php
/**
* Example for using strtotime and getting dates for next month.
* http://www.php.net/manual/en/datetime.formats.relative.php
*
* @author artodeto
* @since 2012-11-13
*/

$dates = array();
$dates['now'] = strtotime('now');
$dates['next Month'] = strtotime('next month');
$dates['first day of next month'] = strtotime('first day of next month');
$dates['second day of next month'] = strtotime('+1 day', strtotime('first day of next month'));

echo 'timestamp' . PHP_EOL;
foreach ($dates as $description => $timestamp) {
  echo $description . ':: ' . $timestamp . PHP_EOL;
}

echo PHP_EOL;
echo 'date' . PHP_EOL;
foreach ($dates as $description => $timestamp) {
  echo $description . ':: ' . date('Y-m-d H:i:s', $timestamp) . PHP_EOL;
}
