<?php
echoMemoryFootprint();
$array = array();
$numberOfItemsToAdd = 100000;

for ($i = 0; $i < $numberOfItemsToAdd; $i++) {
  $array[] = $i;
  if (($i % 100) === 0) {
    echo '.';
  }
  if (($i % 10000) === 0) {
    echo PHP_EOL;
    echoMemoryFootprint();
  }
}

echo PHP_EOL;
echoMemoryFootprint();

function echoMemoryFootprint()
{
  echo 'Current memory footprint: ' . memory_get_usage(true) . PHP_EOL;
}
