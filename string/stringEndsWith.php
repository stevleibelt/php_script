<?php
/**
* Example how to check whether a string ends with a given word or not.
*
* @author stev leibelt
* @since 2013-01-30
*/

/**
* Example take from http://stackoverflow.com/questions/619610/whats-the-most-efficient-test-of-whether-a-php-string-ends-with-another-string
*
* @author stev leibelt
* @param string $string
* @param string $needle
* @return boolean
* @since 2013-01-30
*/
function stringEndsWith($string, $needle)
{
  $stringEndsWith = false;

  if ((strlen($string) > 0)
        && (strlen($needle) > 0)) {
    $stringEndsWith = (substr_compare($string, $needle, -strlen($needle), strlen($needle)) === 0);
  }

  return $stringEndsWith;
}

$testCases = array(
  'hello world' => 'world',
  'hello' => 'you',
  'thats a long text' => 'text',
  'thats a longer text' => 'ng text',
  'thats a even longer text' => 'g tex',
  'and now, the longest text on the test case planet' => 't case planet'
);

foreach ($testCases as $testCaseString => $testCaseNeedle) {
  echo 'string:: ' . $testCaseString . PHP_EOL;
  echo 'needle:: ' . $testCaseNeedle . PHP_EOL;
  echo 'string ends with:: ' . (stringEndsWith($testCaseString, $testCaseNeedle) ? 'yes' : 'no') . PHP_EOL;
  echo PHP_EOL;
}
