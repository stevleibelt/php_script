<?php
/**
* Example for working with strtotime
*
* @author stev leibelt
* @since 2013-02-07
*/

$examples = array(
  '+1 month',
  '10 month',
  '-1 month',
  '+1 minutes',
  '10 minutes',
  '-1 minutes',
  '+2 seconds',
  '20 seconds',
  '-2 seconds',
  '3 hours',
  '30 hours',
  '-3 hours',
  '+4 days',
  '40 days',
  '-4 days'
);

foreach ($examples as $example) {
  $time = time();
  $time = strtotime('2013-01-31');
  $datetime = new DateTime('2013-01-31');

  echo 'example:: "' . $example . '"' . PHP_EOL;
  echo 'strtotime as date for example:: "' . date('Y-m-d H:i:s', strtotime($example, $time)) . '"' . PHP_EOL;
  echo 'strtotime as date for now:: "' . date('Y-m-d H:i:s', $time) . '"' . PHP_EOL;
  echo 'strtotime:: "' . strtotime($example, $time) . '"' . PHP_EOL;
  echo 'current timestamp:: "' . $time . '"' . PHP_EOL;
  echo 'datetime:: '  . $datetime->format('y-m-d H:i:s') . PHP_EOL;
  $datetime->modify($example);
  echo 'datetime modified:: '  . $datetime->format('y-m-d H:i:s') . PHP_EOL;
  echo PHP_EOL;
}
