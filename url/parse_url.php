<?php
/**
* @author stev leibelt
* @since 2013-02-17
*/

$string = 'http://foo.bar.baz/module/controller/action/foo/bar?bar=foo&baz=foz';

$parsedUrl = parse_url($string);

echo var_export($string, true) . PHP_EOL;
echo PHP_EOL;
echo var_export($parsedUrl, true) . PHP_EOL;
