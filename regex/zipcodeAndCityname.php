<?php

$tests = array(
  '09599 Freiberg', '22083 Hamburg', 'Düsseldorf', 'Dresden', '123 Stadt', '0210 Wien', '12313', '#*\n'
);

$pattern = '/(\d{4,5})?(\s)?(.*)/';
$pattern = '/(\d{4,5})?(\s)?(\D*)/';

foreach ($tests as $test) {
  $matches = array();
  
  if (preg_match($pattern, $test, $matches)) {
    echo 'test with "' . $test . '" returns.' . PHP_EOL;
    echo xdebug_var_dump($matches) . PHP_EOL;
  } else {
    echo 'no match found in "' . $test . '"' . PHP_EOL;
  }
}
