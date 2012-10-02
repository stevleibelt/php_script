<?php
$i = 1;

echo PHP_EOL;

$array = array (
  'W1' => array(
    'I. 1', 
    'I. 2'
  ), 
  'W2' => array (
    'II. 1', 
    'II. 2'
  )
);

echo $array['W1'][1] . PHP_EOL;

echo PHP_EOL;

$x = array(
  'montag' => 3, 
  'dienstag' => array(
    4,
    5,
    6,
    7,
    8
  )
);

foreach ($x as $key => $value) {
  echo 'key::' . $key . '=>value::' . $value . PHP_EOL;
}

echo PHP_EOL;

$ar = array(
  'test', 
  0, 
  'test3', 
  'testvier'
);

reset($ar);

while (list($key,$value)=each($ar)) {
  echo 'key::' . $key . '=>value::' . $value . PHP_EOL;
}

foreach($ar as $value) {
  echo 'value::' . $value . PHP_EOL;
}

echo PHP_EOL;

foreach($ar as $key=>$value) {
  echo 'key::' . $key . '=>value::' . $value . PHP_EOL;
}

