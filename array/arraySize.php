<?php
//generating an array
$numberOfEntries = 10;
$array = array();
for ($i = 0; $i < $numberOfEntries; $i++) {
  $array['key' . $i] = 'value ' . $i;
}

echo 'size of array:' . sizeof($array) . PHP_EOL;
echo 'count array:' . count($array) . PHP_EOL;
