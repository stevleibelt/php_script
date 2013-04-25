<?php

$string = 'i am a string and i am ending with a boom!';

$endingWith = array(
    'boom!',
    'boom',
    'foo'
);

foreach ($endingWith as $endString) {
    echo $string . ' ends ' . ((stringEndsWith($string, $endString)) ? '' : 'not ') . 'with ' . $endString . PHP_EOL;
}

function stringEndsWith($string, $endsWith) {
    $lengthOfEndsWith = strlen($endsWith);
    $stringEnding = substr($string, -$lengthOfEndsWith);

    return ($stringEnding == $endsWith);
}
