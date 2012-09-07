<?php
$nl = '<br>' . PHP_EOL;

$array1 = array(1 => 'one', 2 => 'two', 3 => 'three');
$array2 = array('foo' => 'bar', 'oof' => 'rab', 'foobar' => 'raboof');

foreach($array1 as $key1 => $value1) {
	foreach($array2 as $key2 => $value2) {
		if($key2 == 'oof') {
			continue 2;
		}
		echo 'key2::' . $key2 . '--value2::' . $value2 . $nl;
	}
	echo 'key1::' . $key1 . '--value1::' . $value1 . $nl . $nl;
}
