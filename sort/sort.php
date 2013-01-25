<?php

echo 'sort with no parameter' . PHP_EOL;
$fruits = array("lemon", "orange", "banana", "apple");

sort($fruits);
foreach ($fruits as $key => $val) {
    echo "fruits[" . $key . "] = " . $val . PHP_EOL;
}

//--------

echo 'sort with parameter SORT_NATURAL' . PHP_EOL;
$fruits = array("lemon", "orange", "banana", "apple");

sort($fruits, SORT_NATURAL);
foreach ($fruits as $key => $val) {
    echo "fruits[" . $key . "] = " . $val . PHP_EOL;
}

//--------

echo 'natsort' . PHP_EOL;
$fruits = array("lemon", "orange", "banana", "apple");

natsort($fruits);
foreach ($fruits as $key => $val) {
    echo "fruits[" . $key . "] = " . $val . PHP_EOL;
}
