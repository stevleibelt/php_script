<?php
/**
* Simple pings a url.
* Links:
*  http://de3.php.net/manual/en/curl.constants.php
*
* @author stev leibelt
* @since 2013-01-29
*/

$url = 'http://artodeto.bazzline.net';
$curlHandler = curl_init();

curl_setopt($curlHandler, CURLOPT_URL, $url);
curl_setopt($curlHandler, CURLOPT_HEADER, true);
curl_setopt($curlHandler, CURLOPT_NOBODY, true);
curl_setopt($curlHandler, CURLOPT_TIMEOUT, 2);
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);

$responseHeader = curl_exec($curlHandler);
$responseHttpCode = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);
curl_close($curlHandler);

echo 'pinged url "' . $url . '"' . PHP_EOL;
echo 'http response code is "' . $responseHttpCode . '"' . PHP_EOL;
