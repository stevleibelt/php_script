<?php
/**
* Example how to deal with strtotime and get a timestemp for an exact time.
*
* @author stev leibelt
* @since 2013-02-07
*/
date_default_timezone_set('Europe/Berlin');
$nl = PHP_EOL;

$now = date('Y-m-d H:i:s');
$todayAtTen = date('Y-m-d H:i:s', strtotime(date('Y-m-d') . '10 hours'));

echo 'now:: ' . $now . '(' . strtotime($now) . ')' . $nl;
echo 'today at ten:: ' . $todayAtTen . '(' . strtotime($todayAtTen) . ')' . $nl;
