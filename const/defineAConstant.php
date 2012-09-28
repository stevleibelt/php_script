<?php
define('FOO', 'asd');

$output = '';

if ((defined('FOO') === true)) {
  $output .= 'FOO is defined' . PHP_EOL;
  $output .= 'FOO = '.(int) FOO . PHP_EOL;
  $output .= '' . var_dump(extractNumbers(FOO), true) . PHP_EOL;
} else {
 $output .= 'FOO !defined' . PHP_EOL;
}

echo $output;

function extractNumbers($string)
{
  $numbers = array();
  $numberedString = null;

  preg_match_all('/[0-9\(\)+.\- ]/s', $string, $numbers);
  $numberedString = implode('', $numbers[0]);

  return $numberedString;
}

