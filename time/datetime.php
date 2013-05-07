<?php
    $datetime = new DateTime('2013-03-31');
    echo $datetime->format('Y-m-t') . PHP_EOL;
    echo PHP_EOL;
    $datetime->modify('-1 month');
    echo $datetime->format('Y-m-t') . PHP_EOL;
    $datetime->modify('-1 month');
    echo $datetime->format('Y-m-t') . PHP_EOL;
    $datetime->modify('-1 month');
    echo $datetime->format('Y-m-t') . PHP_EOL;

    echo PHP_EOL;
    $datetime = new DateTime('2013-01-31');
    echo $datetime->format('Y-m-t') . PHP_EOL;
    echo PHP_EOL;
    $datetime->modify('+1 month');
    echo '+1 month' . $datetime->format('Y-m-t') . PHP_EOL;
    $datetime->modify('+1 day');
    echo $datetime->format('Y-m-t') . PHP_EOL;
    $datetime->modify('+1 year');
    echo $datetime->format('Y-m-t') . PHP_EOL;
