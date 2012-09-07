<?PHP
$nl = '<br>' . PHP_EOL;

for ($i=0;$i<100;$i++) {
	echo 'id::' . getUniqueId() . $nl;
	sleep(1);
}

function getUniqueId($modulo = 1000)
{
	$timestamp = mktime();
	$id = $timestamp % $modulo;

	return $id;
}
