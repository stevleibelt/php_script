<?php

$array = array(
  'foo' => 'bar',
  'bar' => 'foo',
  'foobar' => 'barfoo',
  'barfoo' => 'foobar'
);

echo 'array::' . PHP_EOL;
echo var_export($array, true) . PHP_EOL;

$entry = array_pop($array);
echo 'poped one entry::' . PHP_EOL;
echo 'array::' . PHP_EOL;
echo var_export($array, true) . PHP_EOL;
echo 'entry::' . PHP_EOL;
echo var_export($entry, true) . PHP_EOL;
