<?php

echo 'testing with \'\'' . PHP_EOL;
isString('');

function isString($string)
{
  if (is_string($string)) {
    echo 'yes' . PHP_EOL;
  } else {
    echo 'no' . PHP_EOL;
  }
}
