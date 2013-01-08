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

$array3 = array(
  'foo',
  'bar',
  'foobar'
);

$array4 = array(
  'foo',
  'bar',
  'barfoo'
);

echo PHP_EOL . 'array1' . PHP_EOL;
echo var_export($array1, true);
echo PHP_EOL . 'array2' . PHP_EOL;
echo var_export($array2, true);
echo PHP_EOL . 'array3' . PHP_EOL;
echo var_export($array3, true);
echo PHP_EOL . 'array4' . PHP_EOL;
echo var_export($array4, true);
echo PHP_EOL . '--------';

echo PHP_EOL . 'arrays merged (array1, array2)' . PHP_EOL;
echo var_export(array_merge($array1, $array2), true);
echo PHP_EOL . '--------';

echo PHP_EOL . 'arrays merged (array2, array1)' . PHP_EOL;
echo var_export(array_merge($array2, $array1), true);
echo PHP_EOL . '--------';

echo PHP_EOL . 'arrays merged (array3, array4)' . PHP_EOL;
echo var_export(array_merge($array3, $array4), true);
echo PHP_EOL . '--------';
