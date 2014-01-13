#!/bin/php
<?php
/**
 * Simple example how to get possition of current element from a list
 * If there is a previous id, you simple move it after the previous id.
 * If there is no previous id (null), move it to the top
 *
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-01-13
 */

$ids = array(
    'first' => 6,
    'in between' => 3,
    'last' => 7,
    'not existing' => 666
);
$list = array(6, 2, 1, 3, 19, 7);

foreach ($ids as $description => $id) {
    $previousId = null;

    foreach($list as $iterator => $itemId) {
        if ($id === $itemId) {
            break;
        }
        $previousId = $itemId;
    }
    echo 'id: ' . $id . PHP_EOL;
    echo 'previous id: ' . var_export($previousId, true) . PHP_EOL;
    echo 'description: ' . $description . PHP_EOL;
}

echo 'list: ' . var_export($list, true) . PHP_EOL;
