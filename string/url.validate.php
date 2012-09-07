<?php
$nl = '<br>' . PHP_EOL;
$urls = array('index.php', 'index.php/foo/bar', 'index.php?foo=bar', 'http://', 'ssh://', 'http://foo', 'ssh://foo', 'http://index.php', 'http://meins.de/index.php', 'http://wirklich.meins.de/index.php', 'http://wirklich.meins.de/index.php?foo=bar', 'http://wirklich.meins.de/index/foo/bar', 'https://www.foo.bar', 'https://user:name@www.foo.bar', 'ftp://www.foo.bar');

foreach($urls as $url) {
	echo 'url: ' . $url . $nl;
	echo xdebug_var_dump(validateUrl($url));
	echo '----' . $nl;
}

function validateUrl($url) {
	$result = array();

	$result['no_flag'] = filter_var($url, FILTER_VALIDATE_URL);
	$result['scheme'] = filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED);
	$result['host'] = filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED);
	$result['path'] = filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);
	$result['query'] = filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED);
	$result['scheme+host'] = filter_var($url, FILTER_VALIDATE_URL, array(FILTER_FLAG_SCHEME_REQUIRED, FILTER_FLAG_HOST_REQUIRED));

	return $result;
}
