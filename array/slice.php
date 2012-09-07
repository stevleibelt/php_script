<?php
$nl = PHP_EOL;
$array = array();
for($i=0;$i<10;$i++){
  $array['key' . $i] = 'value' . $i;
}

$slice = array_slice($array, 3, -2);

echo 'slice 3 -2' . $nl;
echo xdebug_var_dump($slice) . $nl;
echo 'array' . $nl;
echo xdebug_var_dump($array) . $nl;
