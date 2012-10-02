<?php
$foo = null;
$foobar = 'asd';
unset($foobar);

echo 'foo' . var_dump(isset($foo)) . PHP_EOL;
echo 'bar' . var_dump(isset($bar)) . PHP_EOL;
echo 'foobar' . var_dump(isset($foobar)) . PHP_EOL;
