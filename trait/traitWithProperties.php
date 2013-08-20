<?php

$foo = new Foo();
$foo->setFoo('foo');
$foo->setBar('bar');

echo 'getFoo' . PHP_EOL;
echo $foo->getFoo() . PHP_EOL;
echo 'getBar' . PHP_EOL;
echo $foo->getBar() . PHP_EOL;
echo 'getFooBar' . PHP_EOL;
echo $foo->getFooBar() . PHP_EOL;

class Foo
{
    protected $foo;
    use BarTrait;

    public function setFoo($foo)
    {
        $this->foo = $foo;
    }

    public function getFoo()
    {
        return $this->foo;
    }

    public function getFooBar()
    {
        return $this->foo . ' - ' . $this->bar;
    }
}

trait BarTrait
{
    protected $bar;

    public function setBar($bar)
    {
        $this->bar = $bar;
    }

    public function getBar()
    {
        return $this->bar;
    }
}
