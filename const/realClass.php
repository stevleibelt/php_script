<?php

include_once 'abstractClass.php';

class RealClass extends AbstractClass
{
  const FOO = 'foo';
}

echo 'AbstractClass::FOO->' . AbstractClass::FOO . PHP_EOL;
echo 'RealClass::FOO->' . RealClass::FOO . PHP_EOL;
