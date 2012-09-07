<?php

$nl = PHP_EOL;

$string = 'Sankt Maria, München, Freiberg, Bad Oldesloh, Hamburg Dresden Annaberg, Sankt Johannes Oldenburg St. Pauli Berlin';

$additionalDesignation = array(
    'sankt', 
    'san',
    'sao',
    'saint',
    'sint',
    'santa',
    'sta. ',
    'st.',
    'maria',
    'bad'
);

$placeholderToDesignation = array();
$i = 0;

foreach ($additionalDesignation as $designation) {
    $placeholderToDesignation['PLACEHOLDER_TO_DESIGNATION_' . $i++] = $designation . ' ';
    $placeholderToDesignation['PLACEHOLDER_TO_DESIGNATION_' . $i++] = ucfirst($designation) . ' ';
}

$search = array_values($placeholderToDesignation);
$replace = array_keys($placeholderToDesignation);
array_push($search, ', ', ' ');
array_push($replace, 'EXPLODE_PLACEHOLDER', 'EXPLODE_PLACEHOLDER');

$cleanedString = str_replace($search, $replace, $string);

$search = array_keys($placeholderToDesignation);
$replace = array_values($placeholderToDesignation);

$search = array_reverse($search);
$replace = array_reverse($replace);

$cleanedString = str_replace($search, $replace, $cleanedString);

$words = explode('EXPLODE_PLACEHOLDER', $cleanedString);

echo 'explode following string: "' . $string . '"' . $nl;
echo '----' . $nl;
foreach ($words as $word) {
    echo $word . $nl;
}
