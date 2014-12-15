<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-26
 */

class MyClass
{
        public function __set($name, $value)
        {
            echo 'called ' . __METHOD__ . ' with name: "' . $name . 
                '" and value: "' . $value . '"' . PHP_EOL;
        }
}

$myClass = new MyClass();

$myClass->foo = 'bar';  //working
//$myClass->setBar('foo');    //not working, take a look to magicCaller.php
