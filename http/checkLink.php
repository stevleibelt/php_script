<?php
$nl = PHP_EOL;
$url = 'http://www.Aleibelt.de';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_NOBODY, 1);

$response = curl_exec($ch);
$headerCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

echo (xdebug_var_dump($response));
echo (xdebug_var_dump($headerCode));
echo (in_array($headerCode, array(200, 301, 302, 303, 304, 307))) ? 'available' : 'not available';
echo $nl;
?>
