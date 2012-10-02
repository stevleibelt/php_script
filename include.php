<?php

$filename = 'math/to/my/file';

if (@include($filename)) {
  echo 'could include file with path "' . $filename . '"' . PHP_EOL;
} else {
  echo 'could not include file with path "' . $filename . '"' . PHP_EOL;
}

