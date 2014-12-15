<?php
/**
 * Example for fileperms
 *
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-19
 */

$perms = fileperms(__FILE__);
$mode = substr(decoct($perms), 3);

echo 'perms in octal: ' . $perms . PHP_EOL;
echo 'mode: ' . $mode . PHP_EOL;
echo PHP_EOL;
$userMode = substr($mode, 0, 1);
echo 'user mode: ' . $userMode . PHP_EOL;
$hasExecuteFlag = (in_array($userMode, array(2,4,6)));
echo 'has execute flag: ' . var_export($hasExecuteFlag, true) . PHP_EOL;

/*
read    4
write   2
x       1

        6
*/
