<?php
/**
 * Example for stat
 *
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-19
 */

 $currentFileStats = stat(__FILE__);

 echo 'dumping current file stats' . PHP_EOL;
 echo __FILE__ . PHP_EOL;
 echo PHP_EOL;
 echo var_export($currentFileStats) . PHP_EOL;
 echo PHP_EOL;
 echo 'mode in octal: ' . sprintf("%o", $currentFileStats['mode']) . PHP_EOL;
 echo PHP_EOL;
 echo var_export(fileperms(__FILE__), true) . PHP_EOL;
