<?php
$a = 0;
$b = 0;

for($i=0;$i<666;$i++)
{
	$value = randAOrB();
	if($value == 'A') {
		$a++;
	} elseif($value == 'B') {
		$b++;
	}
}

if($a > $b) {
	echo 'A';
} elseif($b > $a) {
	echo 'B';
} else {
	echo 'No A or B :-(';
}

function randAOrB()
{
	$min = rand(0, 9999999999999999);
	$max = rand(0, 9999999999999999);

	if($min > $max) {
		$temp = $min;
		$min = $max;
		$max = $temp;
	} elseif($min == $max) {
		echo 'Damn, do nothing, the world is against you.';
		exit();
	}

	$value = rand($min, $max);

	$minDiff = $value - $min;
	$maxDiff = $max - $value;

	if($minDiff > $maxDiff) {
		$result = 'A';
	} elseif($minDiff < $maxDiff) {
		$result = 'B';
	} else {
		$result = false;
	}

	return $result;
}
