#!/bin/bash
<?php
$array = array(true, "0" => false);
echo var_export($array, true) . PHP_EOL;

$array = array(true, "0" => false, false => true);

echo var_dump($array[0]) . PHP_EOL;
echo var_export($array, true) . PHP_EOL;
