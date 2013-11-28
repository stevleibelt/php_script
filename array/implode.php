<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-11-28
 */

$emptyArray = array();
$toMergeArray = array(
    'foo',
    'bar'
);

$newArray = array_merge($emptyArray, $toMergeArray);

echo implode(' ', $newArray) . PHP_EOL;
