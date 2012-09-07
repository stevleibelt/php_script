<?php

$maximumRuntimeSeconds = 13;
$runtimeSecondStart = time();
$runtimeSecondEnd = $runtimeSecondStart + $maximumRuntimeSeconds;

while(true) {
  if (time() > $runtimeSecondEnd) {
    echo 'start::' . $runtimeSecondStart . PHP_EOL;
    echo 'end::' . $runtimeSecondEnd . PHP_EOL;
    echo 'maximum::' . $maximumRuntimeSeconds . PHP_EOL;
    echo 'current::' . time() . PHP_EOL;
    exit (0);
  }

  sleep(1);
}
