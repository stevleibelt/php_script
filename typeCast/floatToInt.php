<?php

namespace typeCast\floatToInt;

$floatNumbers = array(
  83.34,
  12.61,
  0.5,
  0.49,
  0.51
);

foreach ($floatNumbers as $floatNumber) {
  echo 'float "' . $floatNumber . '" is "' . (int) $floatNumber . '" this as int.' . PHP_EOL;
}
