<?php
/**
 * links: http://de3.php.net/manual/en/function.version-compare.php
 *
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-03-10
 */

echo 'Current php version is: "' . PHP_VERSION . '"' . PHP_EOL;

$version525Check = (version_compare(PHP_VERSION, '5.2.5'));

echo 'This version is ';

switch ($version525Check) {
    case  -1:
        echo 'lower';
        break;
    case  0:
        echo 'equal';
        break;
    case  1:
        echo 'higher';
        break;
   default:
        echo 'undefined';
        break;
}

echo ' then version 5.2.5' . PHP_EOL;
