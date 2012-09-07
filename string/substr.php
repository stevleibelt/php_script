<?php

$string = 'asd, asf, asdgf, asdgfg, asdgasfd,';

echo 'string::' . $string . PHP_EOL;
$string = substr($string, 0, -1);

echo 'string::' . $string . PHP_EOL;
