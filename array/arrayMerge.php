<?php

$array1 = array(
  0 => 0,
 '1' => 1,
 'two' => 2,
  3 => 'default'
);

$array2 = array(
  2 => 2,
  3 => 'new',
  666 => 'the number of the beast'
);

echo PHP_EOL . 'array1' . PHP_EOL;
echo var_export($array1, true);
echo PHP_EOL . 'array2' . PHP_EOL;
echo var_export($array2, true);
echo PHP_EOL . '--------';
echo PHP_EOL . 'arrays merged (array1, array2)' . PHP_EOL;
echo var_export(array_merge($array1, $array2), true);
echo PHP_EOL . '--------';
echo PHP_EOL . 'arrays merged (array2, array1)' . PHP_EOL;
echo var_export(array_merge($array2, $array1), true);
