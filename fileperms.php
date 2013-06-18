<?php
/**
 * Example for fileperms
 *
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-19
 */

$perms = fileperms(__FILE__);
$mode = substr(decoct($perms), 3);

echo 'perms in octal: ' . $perms . PHP_EOL;
echo 'mode: ' . $mode . PHP_EOL;
