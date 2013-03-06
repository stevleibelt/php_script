<?php
/**
* @author stev leibelt
* @since 2013-02-17
*/

$string = 'http://foo.bar.baz/module/controller/action/foo/bar?bar=foo&baz=foz';

parse_str($string, $parsedString);

echo var_export($string, true) . PHP_EOL;
echo PHP_EOL;
echo var_export($parsedString, true) . PHP_EOL;
