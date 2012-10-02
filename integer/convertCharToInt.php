<?php
$string = 'qwtriouüasmnckjdasoiuriwczo98w338wmci3fjk';
$intOfString = getIntOfString($string);

echo 'The int of the sring is ' . $intOfString . PHP_EOL;

function getIntOfString($string) {
	$lengthOfString = strlen($string);
	$intOfString = '';

	for($i=0;$i<$lengthOfString;$i++){
		$char = substr($string, $i, 1);
		$ordOfChar = ord($char);
		$intOfString .= '' . $ordOfChar;
	}

	$intOfString = (int) $intOfString;

	return $intOfString;
}
