<?php
$nl = '<br>' . PHP_EOL;

$array1 = array('meins' => 'meins', 'deins' => 'deins', 0 => 'unsres');
$array2 = array(0 => 'null', 1 => 'eins', 2 => 'zwei');

echo 'array1::' . $nl;
print_r($array1);
echo $nl;

echo $nl . 'array2::' . $nl;
print_r($array2);
echo $nl;

echo $nl . 'array_merge::' . $nl;
print_r(array_merge($array1, $array2));
echo $nl;

