<?php
/**
* Example for retrieving server ip address.
*
* @author stev leibelt
* @since 2013-02-01
*/

if (array_key_exists('SERVER_ADDR', $_SERVER)) {
    echo $_SERVER['SERVER_ADDR'] . PHP_EOL;
} else {
    echo 'SERVER_ADDR not found, looks like you are running the script in cli environment' . PHP_EOL;
}
