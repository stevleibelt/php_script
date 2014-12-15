<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-12-19
 */

$beginArray = array(
    '1970',
    '1970-01',
    '1970-01-01',
    '1983-10-06',
    '2008-08-04'
);
$beginToTime = array();

foreach ($beginArray as $begin) {
    $beginToTime[$begin] = strtotime($begin);
}

foreach ($beginToTime as $begin => $time) {
    echo 'begin: ' . $begin . PHP_EOL;
    echo 'time: ' . $time . PHP_EOL;
    echo 'date(Y-m-d H:i:s): ' . date('Y-m-d H:i:s', $time) . PHP_EOL;
}
