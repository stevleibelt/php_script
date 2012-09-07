<?php

$myArray = array();
debug($myArray, 'array created');

array_push($myArray, 'i am a string');
debug($myArray, 'String added');
array_push($myArray, array('arrayKey' => 'arrayValue'));
debug($myArray, 'array added');

function debug($var, $message = '') 
{
  $nl = PHP_EOL;
  if (strlen($message > 0)) {
    echo $message . $nl;
  }
  echo xdebug_var_dump($var) . $nl;
}
