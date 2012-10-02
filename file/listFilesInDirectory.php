<?php

$notAllowedFilenames = array(
  '.',
  '..',
  '.svn',
  '.git'
);
if ($directoryHandle = opendir('.')) {
  while (false !== ($fileName = readdir($directoryHandle))) {
    if (!in_array($fileName, $notAllowedFilenames)) {
        echo $fileName . PHP_EOL;
    }
  }
  closedir($directoryHandle);
}

