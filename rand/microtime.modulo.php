<?PHP
$nl = '<br>' . PHP_EOL;

$ids = array();
$i = 0;
while (true) {
	$id = getUniqueId();
	if (!isset($ids[$id])) {
		$ids[$id] = true;
		$i++;
	} elseif ($i > 100000) {
		die('no doublicated entries after 100000 runs');
	} else {
		die('double entires after ' . $i . ' runs. id:' . $id);
	}
}

//this method is stable for unique for about 200 runs in time
function getUniqueId($modulo = 1000000)
{
	$timestamp = microtime();

	$id = substr($timestamp, 2, 4) + substr($timestamp, 18, 4);

	$id = $id % $modulo;

	usleep(100000 / $modulo);

	return (int)$id;
}
