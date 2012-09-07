<?php
$nl = '<br>' . PHP_EOL;

$url = 'http://username:password@sub.domain.de/path/with/query/?foo=bar';

echo 'all' . $nl;
echo xdebug_var_dump(parse_url($url));

echo 'username' . $nl;
echo xdebug_var_dump(parse_url($url, PHP_URL_USER));
