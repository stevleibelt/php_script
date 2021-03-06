<?php
define('MEMCACHED_HOST', '10.104.22.70');
define('MEMCACHED_PORT', '11540');

$memcache = new Memcache();

$memcache->connect(MEMCACHED_HOST, MEMCACHED_PORT) or die ('couldn\'t connect');

$version = $memcache->getVersion();
echo 'Server\'s version: '.$version.' . PHP_EOL;

$tmp_object->str_attr = 'test';
$tmp_object->int_attr = 123;

$memcache->set('key', $tmp_object, false, 10) or die ('Failed to save data at the server');
echo 'Store data in the cache (data will expire in 10 seconds)' . PHP_EOL;

$get_result = $memcache->get('key');
echo 'Data from the cache:<br/>' . PHP_EOL;
var_dump($get_result);

echo 'waiting 10 seconds' . PHP_EOL;
sleep(10);

$get_result = $memcache->get('key');
echo 'Data from the cache:<br/>' . PHP_EOL;
var_dump($get_result);
