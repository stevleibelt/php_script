<?php

$limit = 30047;
$chunkSizeLimit = 2500;
$numberOfDatas = array(
  $limit + 1, $limit, $limit -1
);


foreach ($numberOfDatas as $numberOfData) {
  //see math/calculateChunks.php
  $numberOfChunks = ceil($numberOfData / $chunkSizeLimit);

  echo 'limit::' . $limit . PHP_EOL;
  echo 'chunkSizeLimit::' . $chunkSizeLimit . PHP_EOL;
  echo 'numberOfData::' . $numberOfData . PHP_EOL;
  echo 'numerOfChunks::' . $numberOfChunks . PHP_EOL;
  echo PHP_EOL;

  $numberOfProcessedChunks = 0;

  for ($currentChunk = 0; $currentChunk < $numberOfChunks; $currentChunk++) {
    if (($numberOfProcessedChunks + $chunkSizeLimit) > $limit) {
      $currentChunkSize = $limit - $numberOfProcessedChunks;
    } else {
      $currentChunkSize = $chunkSizeLimit;
    }

    if ($currentChunkSize >= 1) {
      $numberOfProcessedChunks += $currentChunkSize;
      echo 'number of processed chunks ' . $numberOfProcessedChunks . "\t" . 'current chunk size ' . $currentChunkSize . PHP_EOL;
    }
  }
  echo PHP_EOL;
}
