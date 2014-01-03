#!/bin/php
<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-01-03
 */

$data = array(
    'no end' => array(
        'begin' => '1980-01-01',
        'end' => null
    ),
    'lower end day' => array(
        'begin' => '1980-01-02',
        'end' => '1980-01-01'
    ),
    'lower end month' => array(
        'begin' => '1980-02-01',
        'end' => '1980-01-01'
    ),
    'lower end year' => array(
        'begin' => '1980-01-01',
        'end' => '1979-01-01'
    ),
    'same begin and end' => array(
        'begin' => '1980-01-01',
        'end' => '1980-01-01'
    ),
    'higher end day' => array(
        'begin' => '1980-01-01',
        'end' => '1980-01-02'
    ),
    'higher end month' => array(
        'begin' => '1980-01-01',
        'end' => '1980-02-01'
    ),
    'higher end year' => array(
        'begin' => '1980-01-01',
        'end' => '1981-01-01'
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

foreach ($data as $dataSet) {
    $begin = (!is_null($dataSet['begin'])) ? stringToTime($dataSet['begin']) : 0;
    $end = (!is_null($dataSet['end'])) ? stringToTime($dataSet['end']) : 0;

    echo PHP_EOL;
    echo 'begin: ' . $begin . ', end: ' . $end . PHP_EOL;
    echo 'end >= begin: ' . (($end >= $begin) ? 'yes' : 'no') . PHP_EOL;
}

/**
 * Expected strings like 'yyyy-mm-dd-hh-mm-ss'
 *
 * @param null|string $string
 * @param string $separator
 */
function stringToTime($string, $separator = '-')
{
    $date = array(
        0 => 0, //year
        1 => 0, //month
        2 => 0, //day
        3 => 0, //hour
        4 => 0, //minute
        5 => 0  //second
    );

    if (!is_null($string)) {
        $data = explode($separator, $string);

        for ($index = 0; $index < 6; $index++) {
            if (isset($data[$index]) && (!is_null($data[$index]))) {
                $date[$index] = $data[$index];
            }
        }
    }

    return mktime($date[3], $date[4], $date[5], $date[1], $date[2], $date[0]);
}
