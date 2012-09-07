<?php
$nl = PHP_EOL;
$string = '<html>&nbsp;ä#öll';

echo 'string' . $nl;
echo $string . $nl;

$newString = urlencode($string);
echo 'urlencoded string' . $nl;
echo $newString . $nl;
