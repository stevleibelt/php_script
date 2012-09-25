<?php
date_default_timezone_set('Europe/Berlin');
$nl = PHP_EOL;

$today = date('Y-m-d');
$tomorrow = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));

echo 'today:: ' . $today . $nl;
echo 'tomorrow:: ' . $tomorrow . $nl;
