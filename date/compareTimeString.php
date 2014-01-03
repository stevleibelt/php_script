#!/bin/php
<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-01-03
 */

$data = array(
    'no end' => array(
        'begin' => '1970-01-01',
        'end' => null
    ),
    'lower end day' => array(
        'begin' => '1970-01-02',
        'end' => '1970-01-01'
    ),
    'lower end month' => array(
        'begin' => '1970-02-01',
        'end' => '1970-01-01'
    ),
    'lower end year' => array(
        'begin' => '1970-01-01',
        'end' => '1969-01-01'
    ),
    'same begin and end' => array(
        'begin' => '1970-01-01',
        'end' => '1970-01-01'
    ),
    'higher end day' => array(
        'begin' => '1970-01-01',
        'end' => '1970-01-02'
    ),
    'higher end month' => array(
        'begin' => '1970-01-01',
        'end' => '1970-02-01'
    ),
    'higher end year' => array(
        'begin' => '1970-01-01',
        'end' => '1971-01-01'
    )
);

$yearIndex = 0;
$monthIndex = 1;
$dayIndex = 2;

foreach ($data as $dataSet) {
    $begin = (!is_null($dataSet['begin'])) ? explode('-', $dataSet['begin']) : null;
    $end = (!is_null($dataSet['end'])) ? explode('-', $dataSet['end']) : null;
    $isValidDataSet = false;

    if (!is_null($begin)){
        if (!is_null($end)) {
            if ($end[$yearIndex] > $begin[$yearIndex]) {
                $isValidDataSet = true;
            } else if ($end[$monthIndex] > $begin[$monthIndex]) {
                $isValidDataSet = true;
            } else if ($end[$dayIndex] > $begin[$dayIndex]) {
                $isValidDataSet = true;
            }
        }
    }

    echo PHP_EOL;
    echo 'begin: ' . (!is_null($begin) ? implode('-', $begin) : 'null') . ', end: ' . (!is_null($end) ? implode('-', $end) : 'null') . PHP_EOL;
    echo 'set is valid: ' . ($isValidDataSet ? 'yes' : 'no') . PHP_EOL;
}
