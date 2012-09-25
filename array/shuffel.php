<?php
$dataCollection = array();
$totalNumberOfItems = 30;

//insert some testdata
for ($i = 0; $i < $totalNumberOfItems; $i++) {
    $dataCollection[] = 'data ' . $i;
}

echo 'array before shuffel' . PHP_EOL;
echo var_export($dataCollection, true);
echo PHP_EOL;

//schuffel the data
shuffle($dataCollection);

echo 'array after shuffel' . PHP_EOL;
echo var_export($dataCollection, true);
