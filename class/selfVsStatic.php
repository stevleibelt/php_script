<?php
echo 'Comparing self:: vs static::.' . PHP_EOL;
echo 'static:: is doing late static binding.' . PHP_EOL;

echo 'Class B extends A' . PHP_EOL;
echo 'Calling static B::test(). Method test is using self.' . PHP_EOL;
echo B::test() . PHP_EOL;

echo PHP_EOL;

echo 'Class D extends C' . PHP_EOL;
echo 'Calling static D::test(). Method test is using static.' . PHP_EOL;
echo D::test() . PHP_EOL;

//take from http://stackoverflow.com/questions/4718808/php-can-static-replace-self
class A 
{
    public static function className() 
    {
        return __CLASS__;
    }

    public static function test()
    {
        return self::className();
    }
}

class B extends A
{
    public static function className()
    {
        return __CLASS__;
    }
}

class C 
{
    public static function className()
    {
        return __CLASS__;
    }

    public static function test()
    {
        return static::className();
    }
}

class D extends C
{
    public static function className()
    {
        return __CLASS__;
    }
}
