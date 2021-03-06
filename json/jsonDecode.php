<?php
/**
* Example for json encoding.
*
* @author Stev Leibelt <artodeto@bazzline.net>
* @since 2013-01-11
*/

$jsonContent = array(
  'int' => 13,
  'string' => 'one two three',
  'stringWithUmlauts' => '"\\u00dcberzone"',
  'array' => '{"string":"one","int":23}'
);

foreach ($jsonContent as $type => $content) {
  echo 'type::' . $type . PHP_EOL;
  echo 'content' . PHP_EOL;
  echo var_export($content, true);
  echo PHP_EOL;
  echo 'decoded from json' . PHP_EOL;
  echo var_export(json_decode($content), true);
  echo PHP_EOL;
  echo '----' . PHP_EOL;
}
