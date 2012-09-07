<?php

$array = array(1=>1, 0=>0, 'zwei'=>'zwei', 'array'=>array('array1'=>'array1', 'array0'=>'array0', 0=>0));
$nl = '<br>' . PHP_EOL;

$asort = $array;
$arsort = $array;
$sort = $array;
$rsort = $array;
asort($asort);
arsort($arsort);
sort($sort);
rsort($rsort);
echo 'array::' . $nl;
echo var_dump($array);
echo $nl . $nl;
echo 'asort::' . $nl;
echo var_dump($asort);
echo $nl;
echo 'arsort::' . $nl;
echo var_dump($arsort);
echo $nl;
echo 'sort::' . $nl;
echo var_dump($sort);
echo $nl;
echo 'rsort::' . $nl;
echo var_dump($rsort);
echo $nl;
