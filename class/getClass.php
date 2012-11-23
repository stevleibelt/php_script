<?php

abstract class A
{
  public final function getName()
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
echo $b->getName() . PHP_EOL;
echo $b->foo() . PHP_EOL;
$c = new C();
echo $c->getName() . PHP_EOL;
echo $c->foo() . PHP_EOL;
