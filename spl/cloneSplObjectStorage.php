<?php
/**
 * Example for SplObjectStorage
 *
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-26
 */

$storage = new SplObjectStorage();

echo str_repeat('-', 40) . PHP_EOL;
echo 'Creating object one object two' . PHP_EOL;
$objectOne = new stdClass();
$objectTwo = new stdClass();

$objectOne->foo = 'bar';
$objectTwo->foo = 'bar';

echo 'adding objects to storage' . PHP_EOL;
$storage->attach($objectOne);
$storage->attach($objectTwo);

dumpStorage($storage);

echo 'cloning storage' . PHP_EOL;
$clonedStorage = clone $storage;
dumpStorage($clonedStorage);

echo str_repeat('-', 40) . PHP_EOL;
echo 'calling removeAll() on cloned storage' . PHP_EOL;
$clonedStorage->removeAll($clonedStorage);
dumpStorage($clonedStorage);

function dumpStorage($storage)
{
    echo 'iterating over storage' . PHP_EOL;
    foreach ($storage as $object) {
        echo 'class: ' . get_class($object) . PHP_EOL;
        $properties = get_object_vars($object);
        foreach ($properties as $name => $value) {
            echo 'name: ' . $name . ' with value: ' . $value . PHP_EOL;
        }
    }
}
