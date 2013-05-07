<?php
/**
* Example for directory iterator
* http://www.php.net/manual/en/class.directoryiterator.php
*
* @author artodeto
* @since 2013-03-06
*/

$directoryIterator = new DirectoryIterator('../');
$countedNumberOfEntries = 0;

foreach ($directoryIterator as $iteratorItem) {
  echo PHP_EOL;
  echo 'basename: ' . $iteratorItem->getBasename() . PHP_EOL;
  echo 'filename: ' . $iteratorItem->getFilename() . PHP_EOL;
  echo 'last access time: ' . date('Y-m-d H:i:s', $iteratorItem->getATime()) . PHP_EOL;
  echo 'last change time: ' . date('Y-m-d H:i:s', $iteratorItem->getCTime()) . PHP_EOL;
  echo 'last modification time: ' . date('Y-m-d H:i:s', $iteratorItem->getMTime()) . PHP_EOL;
  echo 'is diretory: ' . var_export($iteratorItem->isDir(), true) . PHP_EOL;
  echo 'is file: ' . var_export($iteratorItem->isFile() , true). PHP_EOL;
  echo 'is link: ' . var_export($iteratorItem->isLink() , true). PHP_EOL;
  echo 'is dot (.): ' . var_export($iteratorItem->isDot() , true). PHP_EOL;

  $countedNumberOfEntries++;
}

echo PHP_EOL;
echo 'Number of items: ' . count($directoryIterator) . PHP_EOL;
echo 'Counted number of items: ' . $countedNumberOfEntries . PHP_EOL;

echo PHP_EOL;
echo 'RecursiveDirectoryIterator available since php 5.3 with spl support compiled into' . PHP_EOL;

echo PHP_EOL;
echo 'Table of available public methods (130306)' . PHP_EOL;
echo <<<EOC
DirectoryIterator::__construct — Constructs a new directory iterator from a path
DirectoryIterator::current — Return the current DirectoryIterator item.
DirectoryIterator::getATime — Get last access time of the current DirectoryIterator item
DirectoryIterator::getBasename — Get base name of current DirectoryIterator item.
DirectoryIterator::getCTime — Get inode change time of the current DirectoryIterator item
DirectoryIterator::getExtension — Gets the file extension
DirectoryIterator::getFilename — Return file name of current DirectoryIterator item.
DirectoryIterator::getGroup — Get group for the current DirectoryIterator item
DirectoryIterator::getInode — Get inode for the current DirectoryIterator item
DirectoryIterator::getMTime — Get last modification time of current DirectoryIterator item
DirectoryIterator::getOwner — Get owner of current DirectoryIterator item
DirectoryIterator::getPath — Get path of current Iterator item without filename
DirectoryIterator::getPathname — Return path and file name of current DirectoryIterator item
DirectoryIterator::getPerms — Get the permissions of current DirectoryIterator item
DirectoryIterator::getSize — Get size of current DirectoryIterator item
DirectoryIterator::getType — Determine the type of the current DirectoryIterator item
DirectoryIterator::isDir — Determine if current DirectoryIterator item is a directory
DirectoryIterator::isDot — Determine if current DirectoryIterator item is '.' or '..'
DirectoryIterator::isExecutable — Determine if current DirectoryIterator item is executable
DirectoryIterator::isFile — Determine if current DirectoryIterator item is a regular file
DirectoryIterator::isLink — Determine if current DirectoryIterator item is a symbolic link
DirectoryIterator::isReadable — Determine if current DirectoryIterator item can be read
DirectoryIterator::isWritable — Determine if current DirectoryIterator item can be written to
DirectoryIterator::key — Return the key for the current DirectoryIterator item
DirectoryIterator::next — Move forward to next DirectoryIterator item
DirectoryIterator::rewind — Rewind the DirectoryIterator back to the start
DirectoryIterator::seek — Seek to a DirectoryIterator item
DirectoryIterator::__toString — Get file name as a string
DirectoryIterator::valid — Check whether current DirectoryIterator position is a valid file
EOC;

echo PHP_EOL;