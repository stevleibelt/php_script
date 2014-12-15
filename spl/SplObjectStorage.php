<?php
/**
 * Example for SplObjectStorage
 *
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-26
 */

$storage = new SplObjectStorage();

echo 'Creating object one and object two' . PHP_EOL;
$objectOne = new stdClass();
$objectTwo = new stdClass();

$objectOne->foo = 'bar';
$objectTwo->foo = 'bar';

echo 'adding object one to storage' . PHP_EOL;
$storage->attach($objectOne);

echo 'storage contains object one?' . PHP_EOL;
echo var_export($storage->contains($objectOne), true) . PHP_EOL;
echo 'storage contains object two?' . PHP_EOL;
echo var_export($storage->contains($objectTwo), true) . PHP_EOL;
echo '----------------' . PHP_EOL;

echo 'adding object two to storage' . PHP_EOL;
$storage->attach($objectTwo);

echo 'storage contains object one?' . PHP_EOL;
echo var_export($storage->contains($objectOne), true) . PHP_EOL;
echo 'storage contains object two?' . PHP_EOL;
echo var_export($storage->contains($objectTwo), true) . PHP_EOL;
echo '----------------' . PHP_EOL;

echo 'changing object one' . PHP_EOL;
$objectOne->foo = 'foo';
$objectOne->bar = 'bar';

echo 'storage contains object one?' . PHP_EOL;
echo var_export($storage->contains($objectOne), true) . PHP_EOL;
echo 'storage contains object two?' . PHP_EOL;
echo var_export($storage->contains($objectTwo), true) . PHP_EOL;
echo '----------------' . PHP_EOL;

echo 'adding object one again' . PHP_EOL;
$storage->attach($objectOne);

echo 'storage contains object one?' . PHP_EOL;
echo var_export($storage->contains($objectOne), true) . PHP_EOL;
echo 'storage contains object two?' . PHP_EOL;
echo var_export($storage->contains($objectTwo), true) . PHP_EOL;
echo '----------------' . PHP_EOL;

echo 'iterating over storage' . PHP_EOL;
foreach ($storage as $object) {
    echo 'class: ' . get_class($object) . PHP_EOL;
    $properties = get_object_vars($object);
    foreach ($properties as $name => $value) {
        echo 'name: ' . $name . ' with value: ' . $value . PHP_EOL;
    }
}
