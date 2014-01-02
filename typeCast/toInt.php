<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-01-02
 */

 $values = array(
     'null' => null,
     'empty string' => '',
     'string' => 'foo bar',
     'zero' => 0,
     'int' => 23,
     'float' => 0.213,
     'array' => array()
 );

 foreach ($values as $value) {
     echo 'Value: ' . var_export($value, true) . ' (is integer: ' . (is_integer($value) ? 'yes' : 'no') . ') -> ' . (int) $value . PHP_EOL;
 }
