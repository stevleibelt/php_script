<?php

$unsortedArray = array(
  berlin => 'GEO#DEU-9449',
  essen => 'GEO#DEU-22499',
  frankfurt => 'GEO#DEU-13201',
  bremen => 'GEO#DEU-12431',
  münster => 'GEO#DEU-24280',
  halle => 'GEO#DEU-33633',
  freiburg => 'GEO#DEU-156',
  oberhausen => 'GEO#DEU-22937',
  kassel => 'GEO#DEU-14282',
  hagen => 'GEO#DEU-21340',
  hamm => 'GEO#DEU-21385',
  mülheim => 'GEO#DEU-22893',
  ludwigshafen => 'GEO#DEU-27832',
  oldenburg => 'GEO#DEU-20648',
  heilbronn => 'GEO#DEU-1931',
  wolfsburg => 'GEO#DEU-18478',
  offenbach => 'GEO#DEU-13600',
  fürth => 'GEO#DEU-3783',
  koblenz => 'GEO#DEU-27567',
  schwerin => 'GEO#DEU-17556',
  esslingen => 'GEO#DEU-1609',
  marl => 'GEO#DEU-24430',
  minden => 'GEO#DEU-22126',
  kerpen => 'GEO#DEU-24015',
  berghein => 'GEO#DEU-23984',
  rosenheim => 'GEO#DEU-6423',
  langenfeld => 'GEO#DEU-22736',
  stolberg => 'GEO#DEU-23416',
  emden => 'GEO#DEU-20328',
  walldorf => 'GEO#DEU-1475'
);

$sortedArrayByKey = $unsortedArray;
$sortedArrayByValue = $unsortedArray;

ksort($sortedArrayByKey, SORT_STRING);
asort($sortedArrayByValue, SORT_STRING);

echo 'unsortedArray::' . PHP_EOL;
echo xdebug_var_dump($unsortedArray);
echo PHP_EOL;

echo 'sortedArrayByKey::' . PHP_EOL;
echo xdebug_var_dump($sortedArrayByKey);
echo PHP_EOL;

echo 'sortedArrayByValue::' . PHP_EOL;
echo xdebug_var_dump($sortedArrayByValue);
echo PHP_EOL;
