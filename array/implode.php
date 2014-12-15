<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-11-28
 */

$defaultArray = array(
    'values' => array()
);
$toMergeArray = array(
    'values' => array(
        'foo',
        'bar'
    )
);

$newArray = array_merge($defaultArray, $toMergeArray);

echo implode(' ', $newArray['values']) . PHP_EOL;
