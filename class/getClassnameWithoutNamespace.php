<?php
/**
* Example how to deal with namespace driven classnames.
*
* @author artodeto
* @since 2013-01-28
*/

//define first namespace and class
namespace Foo;

class Bar
{
}

//define second namespace and class
namespace Bar;

class Foo
{
}

//define namespace for example
namespace Foobar;

$bar = new \Foo\Bar;
$foo = new \Bar\Foo;

echo 'with namespace:: ' . getClassname($foo) . PHP_EOL;
echo 'with namespace:: ' . getClassname($bar) . PHP_EOL;

echo PHP_EOL;

echo 'without namespace:: ' . getClassnameWithoutNamespace($foo) . PHP_EOL;
echo 'without namespace:: ' . getClassnameWithoutNamespace($bar) . PHP_EOL;

function getClassnameWithoutNamespace($class)
{
  $classnameWithNamespace = get_class($class);
  $classnameWithoutNamespace = explode('\\', $classnameWithNamespace);

  return end($classnameWithoutNamespace);
}

function getClassname($class)
{
  return get_class($class);
}
