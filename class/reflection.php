<?php

$reflector = new ReflectionClass('MyClass');

echo 'class name: ' . $reflector->getName() . PHP_EOL;
echo 'comment: ' . print_r($reflector->getDocComment(), true) . PHP_EOL;
echo 'constants: ' . print_r($reflector->getConstants(), true) . PHP_EOL;
echo 'parent class: ' . print_r($reflector->getParentClass(), true) . PHP_EOL;
echo 'constructor: ' . print_r($reflector->getConstructor(), true) . PHP_EOL;
echo 'default properties: ' . print_r($reflector->getDefaultProperties(), true) . PHP_EOL;

class MyClass
{
  const FOO = 'BAR';

  public $publicVar;
  protected $protectedVar;
  private $privateVar;

  public function __constructor()
  {
    $this->publicVar = 'publicVar';
    $this->protectedVar = 'protectedVar';
    $this->privateVar = 'privateVar';
  }

  public function publicFunction()
  {
    echo __METHOD__;
  }

  protected function protectedFunction()
  {
    echo __METHOD__;
  }

  private function privateFunction()
  {
    echo __METHOD__;
  }
}
