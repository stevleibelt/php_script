<?php

$stack = new SplStack();

$stack->push('foo');
$stack->push('bar');

echo 'Number of entries:' . $stack->count() . PHP_EOL;
echo 'First element:' . $stack->pop() . PHP_EOL;
echo 'Second element:' . $stack->pop() . PHP_EOL;
try {
  echo 'Third element:' . $stack->pop() . PHP_EOL;
} catch (Exception $exception) {
  echo 'No third element available.' . PHP_EOL . $exception->getMessage() . PHP_EOL;
}
