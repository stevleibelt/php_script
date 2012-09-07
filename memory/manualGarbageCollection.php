<?php
$useGc = true;

if ($useGc) {
  gc_enable();
}

ini_set('memory_limit', '1024M');
echo 'memory limit::' . ini_get('memory_limit') . PHP_EOL;
for($i=0;$i<1000;$i++) {
  echo 'run ' . $i . '/1000' . PHP_EOL;
  trashing($useGc);
}

function trashing($useGc = true) 
{
  $array = array();

  echo 'memory before creating array::' . formatBytes(memory_get_usage(true)) . ' MB' . PHP_EOL;

  for($i=0;$i<8000000;$i++) {
    $array[] = 1;
  }
  echo 'memory after creating array::' . formatBytes(memory_get_usage(true)) . ' MB' . PHP_EOL;

  if ($useGc) {
    unset($array, $i);
    echo 'memory after unsetting array::' . formatBytes(memory_get_usage(true)) . ' MB' . PHP_EOL;
  }
  if ($useGc) {
    gc_collect_cycles();
    echo 'memory after manual garbage collection::' . formatBytes(memory_get_usage(true)) . ' MB' . PHP_EOL;
  }
}

function formatBytes($numberOfBytes)
{
  $numberOfBytes = (($numberOfBytes / 1024) / 1024);

  return $numberOfBytes;
}
