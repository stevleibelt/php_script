<?php
/**
* @author artodeto
* @since 2013-02-22
*/

$array = array(
'foo' => 'bar',
'bar' => 'foo',
'baz' => 'foobar'
);

function arrayWalkExample(&$key, &$value, $data)
{
    echo 'key::' . $key . PHP_EOL;
    echo 'value::' . $value . PHP_EOL;
    echo 'data::' . $data . PHP_EOL;

    $key .= ' is not modified';
    $value .= ' modified';
}

array_walk($array, 'arrayWalkExample', 'array walk example data');

echo PHP_EOL;

echo var_export($array, true);

echo PHP_EOL;
