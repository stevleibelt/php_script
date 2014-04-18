<?php

$files = array(
  'read', 'write', 'readWrite'
);

foreach ($files as $file) {
  try {
    $fh = fopen($file, 'a');
  } catch (Exeption $e) {
    echo 'fopen::' . $e->getMessage();
    continue;
  }

  if (is_object($fh)) {
    try {
      fclose($fh);
    } catch (Exception $e) {
      echo 'fclose::' . $e->getMessage();
    }
  }
}
