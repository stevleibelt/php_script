<?php
/**
 * This script shows an example how to list all implemented interfaces from
 *  an object.
 *
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-24
 */

//----
//code we need for this example
//----
//create some interfaces we can implement
interface FooInterface {}
interface BarInterface {}
interface FoobarInterface {}

//create a class we can instantiate
class MyClass implements FooInterface, BarInterface, FoobarInterface {}

//----
//example
//----
//first we need an instance of an existing class
 $object = new MyClass();

//now we get all implemented interfaces and interate over them for creating output
$className = get_class($object);
$implementedInterfaces = class_implements($object);

echo 'The class "' . $className . '" implements "' . count($implementedInterfaces) . '" interfaces.' . PHP_EOL;

foreach ($implementedInterfaces as $implementedInterface) {
    echo $implementedInterface . PHP_EOL;
}
