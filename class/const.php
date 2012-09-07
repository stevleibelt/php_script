<?php
$nl = PHP_EOL;

echo 'Foo::foo->' . Foo::foo . $nl;
echo 'Bar::foo->' . Bar::foo . $nl;
echo 'Bar::bar->' . Bar::bar . $nl;

class Foo
{
  const foo = 'bar';
}

class Bar extends Foo
{
  const bar = 'foo';
}
