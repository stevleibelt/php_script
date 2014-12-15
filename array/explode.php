<?php
/**
 * @author stev leibetl <artodeto@bazzline.net>
 * @since 2013-10-16
 */

$string = 'foo || bar || foobar';
$array = explode(' || ', $string);

echo var_export($array, true) . PHP_EOL;
