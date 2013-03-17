<?php
/**
* How to unset a key in a multidimeonsional array.
*
* @author artodeto
* @since 2013-03-17
*/

$array = array(
  '1' => array(
    '1.1' => 'one',
    '1.2' => array(
      '1.2.1' => 'one',
      '1.2.2' => 'two',
      '1.2.3' => 'three'
    ),
    '1.3' => array(
      '1.3.1' => 'one'
    )
  ),
  '2' => array(
    '2.1',
    '2.2'
  )
);

$path = array('1', '1.2', '1.2.2');

echo 'array' . PHP_EOL;
echo var_export($array, true) . PHP_EOL;
echo 'path' . PHP_EOL;
echo var_export($path, true) . PHP_EOL;

unsetArrayKeyByPath($array, $path);
echo 'array' . PHP_EOL;
echo var_export($array, true) . PHP_EOL;

function unsetArrayKeyByPath(array &$array, array $path)
{
//we can also use array_shift
//    $keyFromPath = array_shift($path);
    $currentPathStep = current($path);

    if (isset($array[$currentPathStep])) {
        if (is_array($array[$currentPathStep])) {
            next($path);
            unsetArrayKeyByPath($array[$currentPathStep], $path);
        } else {
            unset($array[$currentPathStep]);
        }
    }
}
