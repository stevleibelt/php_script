<?php

$string = 'boom, i am a string and i am ending with a boom!';

$startingWith = array(
    'boom!',
    'boom',
    'foo'
);

foreach ($startingWith as $startString) {
    echo $string . ' ends ' . ((stringStartsWith($string, $startString)) ? '' : 'not ') . 'with ' . $startString . PHP_EOL;
}

function stringStartsWith($string, $startsWith) {
    $lengthOfStartsWith = strlen($startsWith);
    $stringStarting = substr($string, 0, $lengthOfStartsWith);

    return ($stringStarting == $startsWith);
}
