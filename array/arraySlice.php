<?php

$array = array(
  'foo' => 'bar',
  'bar' => 'foo',
  'foobar' => 'barfoo',
  'barfoo' => 'foobar'
);

echo var_export($array, true) . PHP_EOL;
$entry = array_slice($array, 1, 1);
echo 'after array_slice($array, 1, 1):' . PHP_EOL;
echo var_export($array, true) . PHP_EOL;
echo 'sliced entry::' . PHP_EOL;
echo var_export($entry, true) . PHP_EOL;
