<?PHP
$expiry = '2009-02-28 00:00:01';

if( !isExpired($expiry) ){
	echo 'schwing';
}else{
	echo 'schwang';
}

function isExpired($expiry)
{
	if (isset($expiry))
		return  strtotime($expiry) < time();

	return false;
}
?>