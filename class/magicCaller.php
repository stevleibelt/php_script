<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-26
 */

class MyClass
{
        public function __call($name, $value)
        {
            echo 'called ' . __METHOD__ . ' with name: "' . $name . 
                '" and values: "' . implode(',' $value) . '"' . PHP_EOL;
        }
}

$myClass = new MyClass();

//$myClass->foo = 'bar';  //not working, take a look to magicSetter.php
$myClass->setBar('foo');    //working
