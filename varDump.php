<?php

$array = array(
  'key1' => 'value1',
  'key2' => 'value2',
  'key3' => 'value3'
);

echo 'print_r::' . PHP_EOL;
echo print_r($array, true) . PHP_EOL;

echo PHP_EOL . 'var_export::' . PHP_EOL;
echo var_export($array, true) . PHP_EOL;
