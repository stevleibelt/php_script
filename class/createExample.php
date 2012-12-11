<?php

class A
{
    private $value;

    static public function create13()
    {
        $a = new A(13);

        return $a;
    }

    static public function create42()
    {
        $a = new A(42);

        return $a;
    }

    private function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}

$a13 = A::create13();
$a42 = A::create42();

echo 'value of a 13::' . $a13->getValue() . PHP_EOL;
echo 'value of a 42::' . $a42->getValue() . PHP_EOL;
