<?php

$types = array(
  null,
  false,
  true,
  1,
  1.1,
  'string',
  array(1, 2, 3)
);

foreach ($types as $type) {
  echo 'value::' . var_export($type, true) . PHP_EOL;
  echo 'as boolean::' . var_export(((boolean) $type), true) . PHP_EOL;
  echo 'as integer::' . var_export(((integer) $type), true) . PHP_EOL;
  echo 'as string::' . var_export(((string) $type), true) . PHP_EOL;
  echo 'as array::' . var_export(((array) $type), true) . PHP_EOL;
}
