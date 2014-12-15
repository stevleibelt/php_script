<?php
/**
 * Example to show how private trait properties are handles in classes
 *
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-20
 */

 /**
  * Class Foo
  * 
  * @author stev leibelt <artodeto@bazzline.net>
  * @since 2013-08-20
  */
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

 /**
  * Trait BarTrait
  *
  * @author stev leibelt <artodeto@bazzline.net>
  * @since 2013-08-20
  */
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

echo '----' . PHP_EOL;
echo 'Creating class and injecting property values.' . PHP_EOL;

$foo = new Foo();
$foo->setFoo('foo');
$foo->setBar('bar');

echo '----' . PHP_EOL;
echo 'getFoo' . PHP_EOL;
echo $foo->getFoo() . PHP_EOL;

echo 'getBar' . PHP_EOL;
echo $foo->getBar() . PHP_EOL;

echo 'getFooBar' . PHP_EOL;
echo $foo->getFooBar() . PHP_EOL;
echo '----' . PHP_EOL;
