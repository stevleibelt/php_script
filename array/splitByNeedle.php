<?php
$nl = PHP_EOL;

$arrayToSplit = array(
    'text asd ae',
    '"asda asd" asdasd',
    'asd "asd"',
    'adasdfd "asdasdasd asdawd+"asdasd'
);

$splits = splitArrayByNeedle($arrayToSplit, '"');

echo 'arrayToSplit::' . $nl;
echo var_dump($arrayToSplit, true) . $nl;
echo 'splittedArray::' . $nl;
echo var_dump($splits, true) . $nl;

function splitArrayByNeedle(array $array, $needle, $keynameForNeedledArray = 0, $keynameForUnneedledArray = 1)
{
    $splits = array(
      $keynameForNeedledArray => array(),
      $keynameForUnneedledArray => array()
    );

    foreach($array as $entry) {
        array_push($splits[$keynameForNeedledArray], $entry);
      if (substr_count($entry, $needle) > 0) {
      } else {
        array_push($splits[$keynameForUnneedledArray], $entry);
      }
    }

    return $splits;
}
