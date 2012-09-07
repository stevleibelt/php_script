<?php
$nl = PHP_EOL;

$string = 'Word1, Word2 , Word3 and Word4 or Word5 oder Wort6 / Word 7 Word-8';
$delimiters = array(
    ', ',
    ' , ',
    ' oder ',
    ' or ',
    ' / ',
    ' und ',
    ' and '
);
$words = array();

$unionPlaceholder = 'ARTODETO_UNION_PLACEHOLDER';
$unifiedString = str_replace($delimiters, $unionPlaceholder, $string);

$words = explode($unionPlaceholder, $unifiedString);

echo 'splitting following string:' . $nl . '"' . $string . '"' . $nl;
echo '----' . $nl;

foreach ($words as $word) {
    echo $word . $nl;
}
