<?php
$nl = '<br>' . PHP_EOL;

$strings = array(0 => 'NULL', 1 => 'eins', 2 => 'drei');

echo 'By if.' . $nl;
$start = microtime();
foreach($strings as $key => $value) {
	$true = '==';
	if($key == 2) {
		$true = '!=';
	}
	if(($key == 0) 
	   && ($value != 'zero')) {
		$true = '!=';
	}
	echo '"' . $key . '" ' . $true . ' "' . $value . '".' . $nl;
}
echo 'time:: ' . (microtime() - $start) . $nl;

echo 'And now by switch.' . $nl;
$start = microtime();
foreach($strings as $key => $value) {
	switch($key) {
		case 2:
			$true = '!=';
			break;
		case 0:
			if($value != 'zero') {
				$true = '!=';
			}
			break;
		default:
			$true = '==';
			break;
	}
	echo '"' . $key . '" ' . $true . ' "' . $value . '".' . $nl;
}
echo 'time:: ' . (microtime() - $start) . $nl;
