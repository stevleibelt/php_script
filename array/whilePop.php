<?php

$array = array();

for($i=0;$i<10;$i++) {
  $array[] = 'key' . $i;
}

while ($value = array_pop($array)) {
  echo 'value::' . $value . PHP_EOL;
}

echo 'array::' . var_export($array, true) . PHP_EOL;

echo 'finished :-)' . PHP_EOL;
