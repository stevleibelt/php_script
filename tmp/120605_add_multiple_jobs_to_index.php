<?php

$md5Hashs = array(
	'51ebb669d76f6fcf042c70ed9ed11586',
	'a83ca239759320d7ea2545a24741e06d',
	'1f1043a2946b9a7f0152c3f03e416deb',
	'35687501026143d5e23cb6f97b368df7',
	'88ff931f740018af9884cdb505b62c7b',
	'041ce7b1e2864908d95f1d8f4c88a97d',
	'03e4283cd2338bb69bc06baa8f977218',
	'efd5f1062fb8a6394ac620dcd29d5f0e',
	'7c7ce75ffc4350e6a92712b1e47d950e',
	'db92d3ea712462b942fbd214a6ddd8e5',
);

$nl = PHP_EOL;

foreach ($md5Hashs as $md5Hash) {
	$url = 'http://branch.devuser.jldev/demo/addorupdatejob?hashid=' . $md5Hash . '&jobtype=1';

	echo 'indexing hash "' . $md5Hash . '"' . $nl;
	$cmd = 'wget -O - ' . $url;
	echo system($cmd) . $nl;
}
