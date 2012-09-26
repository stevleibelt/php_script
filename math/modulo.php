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
