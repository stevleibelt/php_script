<?php
/**
* Nothing mindblowing, just a "remember me" helper.
*
* @author artodeto
* @since 2013-04-05
*/

$a = new A();

echo 'isset A' . var_dump(isset($a->propertyA)) . PHP_EOL;
echo 'isset B' . var_dump(isset($a->propertyB)) . PHP_EOL;
echo 'isset C' . var_dump(isset($a->propertyC)) . PHP_EOL;
echo 'isset D' . var_dump(isset($a->propertyD)) . PHP_EOL;

class A
{
    public $propertyA;
    public $propertyB;
    public $propertyC;

    public function __construct()
    {
        $this->propertyA = 'A';
    }
}
