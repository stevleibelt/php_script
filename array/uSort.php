<?php
/**
 * Example for using usort
 *
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-13
 */

$objectOne = new stdClass();
$objectOne->uid = '1111';

$objectTwo = new stdClass();
$objectTwo->uid = '2222';

$objectThree = new stdClass();
$objectThree->uid = '3333';

$objectFour = new stdClass();
$objectFour->uid = '4444';

 $unsorted = array(
     $objectThree,
     $objectTwo,
     $objectOne,
     $objectFour
 );

function array_usort_callback(stdClass $objectOne, stdClass $objectTwo)
{
    $order = array(
       '1111' => 0,
       '2222' => 1,
       '3333' => 2,
       '4444' => 3
    );

    return ($order[$objectOne->uid] < $order[$objectTwo->uid]) ? -1 : 1;
}

//output

echo '---- unsorted array ----' . PHP_EOL;
echo var_export($unsorted, true) . PHP_EOL;

usort($unsorted, 'array_usort_callback');

echo PHP_EOL;
echo '---- sorted array ----' . PHP_EOL;
echo var_export($unsorted, true) . PHP_EOL;
