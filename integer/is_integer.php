<?php
$numberArray = array(
  'asd', '123', '123.123', 123213, -123, '-123', '-213.123', -123.123, 123.123
);

foreach ($numberArray as $number) {
  echo 'value::' . var_export($number, true) . PHP_EOL;
  echo 'is_integer::' . var_export(is_integer($number), true) . PHP_EOL;
}
