<?php

namespace my;

abstract class A
{
  public final function getClassName()
  {
    return get_class($this);
  }

  abstract function foo();
}

class B extends A
{
  public function foo()
  {
    return 'B!';
  }
}

class C extends A
{
  public function foo()
  {
    return 'C!';
  }
}

$b = new B();
echo $b->getClassName() . PHP_EOL;
echo $b->foo() . PHP_EOL;
$c = new C();
echo $c->getClassName() . PHP_EOL;
echo $c->foo() . PHP_EOL;
