<?php
$array = array(
  0 => 'buuu',
  1 => 'schwing',
  'kalump' => 'doing',
  'gkorp' => array(
    'schwing' => 'droell',
    23 => 'die antwort ist 42'
  )
);

$s = 'schwing';

if(in_array($s, $array)) {
  echo 'string "' . $s . '" is in array' . PHP_EOL;
} else {
  echo 'string "' . $s . '" is not in array' . PHP_EOL;
}

echo 'string "' . $s . '" is a key of the array and has the value ' . array_search($s, $array) . PHP_EOL;

if(array_key_exists($s, $array)) {
  echo 'string "' . $s . '" is a valid key of the array' . PHP_EOL;
} else {
  echo 'string "' . $s . '" is not a valid key of the array' . PHP_EOL;
}

echo 'The keys of the array are:' . PHP_EOL;
var_dump(array_keys($array));

echo PHP_EOL;
echo 'The values of the array are:' . PHP_EOL;
var_dump(array_values($array));

echo PHP_EOL;
echo 'The array itself is:' . PHP_EOL;
var_dump($array);
