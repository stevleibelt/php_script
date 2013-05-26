<?php
$newLineAfterNumberOfEntries = 10;
$totalNumberOfEntries = 111;

echo PHP_EOL;

for ($i = 0; $i < $totalNumberOfEntries; $i++) {
  if (($i % $newLineAfterNumberOfEntries) === 0) {
    echo PHP_EOL;
  }

  echo '.';
}

echo PHP_EOL;

echo 'dividend: ' . $totalNumberOfEntries . PHP_EOL;
echo 'divisor: ' . $newLineAfterNumberOfEntries . PHP_EOL;
echo 'value of quotient: ' . ($totalNumberOfEntries / $newLineAfterNumberOfEntries) . PHP_EOL;
