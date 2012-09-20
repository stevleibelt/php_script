<?php

$chunkSizeLimit = 4000;
$totalNumbersOfData = array(
  0, 1, 3999, 4001, 11999, 12000, 12001
);

output('total', 'chunks');
foreach ($totalNumbersOfData as $totalNumberOfData) {
  output($totalNumberOfData, calculateNumberOfChunks($totalNumberOfData, $chunkSizeLimit));
}

function output($firstColumn, $secondColumn) {
  echo "\t" . $firstColumn  . "\t" . $secondColumn . PHP_EOL;
}

function calculateNumberOfChunks($totalNumberOfData, $chunkSizeLimit)
{
  if ($totalNumberOfData > $chunkSizeLimit) {
    $numberOfChunks = ceil($totalNumberOfData / $chunkSizeLimit);
  } else {
    $numberOfChunks = 1;
  }

  return $numberOfChunks;
}
